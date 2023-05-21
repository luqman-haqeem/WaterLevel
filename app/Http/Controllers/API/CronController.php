<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\CurrentLevel;
use App\Models\Districts;
use App\Models\Station;
use Illuminate\Http\Request;

class CronController extends Controller
{
    /**
     * Update the current water level.
     *
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        ignore_user_abort(true);

        $districts = Districts::all();

        // Prepare the bulk update data array
        $bulkUpdateData = [];

        foreach ($districts as $district) {
            $curls = [];

            $curlMultiHandler = curl_multi_init();

            $url =  'http://infobanjirjps.selangor.gov.my/JPSAPI/api/StationRiverLevels/GetWLAllStationData/' . $district->id;
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 5,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
            ));
            curl_multi_add_handle($curlMultiHandler, $curl);
            $curls[] = $curl;

            // Execute asynchronous requests
            $active = null;
            do {
                $status = curl_multi_exec($curlMultiHandler, $active);
            } while ($status === CURLM_CALL_MULTI_PERFORM || $active);

            // Process responses
            foreach ($curls as $curl) {
                $response = curl_multi_getcontent($curl);

                if (curl_errno($curl)) {
                    echo "Error: " . curl_error($curl);
                }

                $stationsJps = json_decode($response);

                if (!isset($stationsJps->stations)) {
                    return response()->json(
                        ['error' => 'Cannot fetch data from JPS selangor', "url" => $url],
                        500
                    );
                }
                // print_r($stationsJps->stations);
                foreach ($stationsJps->stations as $stationJps) {
                    $station = Station::where('JPS_sel_id', $stationJps->id)->first();

                    if ($station) {
                        $bulkUpdateData[] = [
                            'station_id' => $station->id,
                            'current_level' => $stationJps->waterLevel,
                            'alert_level' => $stationJps->waterlevelStatus,
                        ];
                    }
                }

                curl_multi_remove_handle($curlMultiHandler, $curl);
            }

            curl_multi_close($curlMultiHandler);
        }
        // dd($bulkUpdateData);
        // Perform bulk update
        if (!empty($bulkUpdateData)) {
            $currentLevelModel = new CurrentLevel();

            $table = $currentLevelModel->getTable();

            $cases = [];
            $ids = [];
            $updatedDate = date('Y-m-d H:i:s');

            foreach ($bulkUpdateData as $data) {
                $stationId = $data['station_id'];
                $currentLevel = $data['current_level'];
                $alertLevel = $data['alert_level'];

                $cases[] = "WHEN {$stationId} THEN {$currentLevel}";
                $ids[] = $stationId;
            }

            $ids = implode(',', $ids);
            $cases = implode(' ', $cases);

            $query = "UPDATE {$table} SET current_level = (CASE id {$cases} END), alert_level = (CASE id {$cases} END), updated_at = '{$updatedDate}' WHERE id IN ({$ids})";

            \DB::update(\DB::raw($query));

            return response()->noContent();
        }
    }
}
