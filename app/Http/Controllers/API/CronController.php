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
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'http://infobanjirjps.selangor.gov.my/JPSAPI/api/StationRiverLevels/GetWLAllStationData/' . $district->id,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
            ));

            $response = curl_exec($curl);
            if (curl_errno($curl)) {
                echo "Echo: " . curl_error($curl);
            }
            curl_close($curl);
            $stationsJps  = json_decode($response);

            foreach ($stationsJps->stations as $stationJps) {
                $station = Station::where('JPS_sel_id', $stationJps->id)->first();
                if (empty($station)) {
                    continue;
                }

                $currentLevel = CurrentLevel::where('station_id', $station->id)->first();

                if ($stationJps->waterLevel >= $station->danger_water_level) {
                    $alert_level = 3;
                } else if ($stationJps->waterLevel >= $station->warning_water_level) {
                    $alert_level = 2;
                } else if ($stationJps->waterLevel >= $station->alert_water_level) {
                    $alert_level = 1;
                } else {
                    $alert_level = 0;
                }


                $currentLevel->update(
                    [
                        'current_level' => $stationJps->waterLevel,
                        'alert_level' => $alert_level
                    ]
                );
                $this->blastNotification($station, $alert_level);
            }
        }
        // dd($bulkUpdateData);
        // Perform bulk update
        // if (!empty($bulkUpdateData)) {
        //     $currentLevelModel = new CurrentLevel();

        //     $table = $currentLevelModel->getTable();

        //     $cases = [];
        //     $ids = [];
        //     $updatedDate = date('Y-m-d H:i:s');

        //     foreach ($bulkUpdateData as $data) {
        //         $stationId = $data['station_id'];
        //         $currentLevel = $data['current_level'];
        //         $alertLevel = $data['alert_level'];

        //         $cases[] = "WHEN {$stationId} THEN {$currentLevel}";
        //         $ids[] = $stationId;

        //     }

        //     $ids = implode(',', $ids);
        //     $cases = implode(' ', $cases);

        //     $query = "UPDATE {$table} SET current_level = (CASE id {$cases} END), alert_level = (CASE id {$cases} END), updated_at = '{$updatedDate}' WHERE id IN ({$ids})";

        //     \DB::update(\DB::raw($query));



        //     return response()->noContent();
        // }


    }
    function blastNotification(Station $station, $alert_level)
    {
        if ($alert_level == 3) {
            foreach ($station->subscribedUsers as $user) {
                $user->notify(new SendDangerNotification($station));
            }
        }
    }
}
