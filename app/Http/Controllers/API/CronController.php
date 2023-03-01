<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\CurrentLevel;
use App\Models\Districts;
use App\Models\Station;
use Illuminate\Http\Request;

class CronController extends Controller
{
    //
    /**
     * Update The  current water level.
     *
     * @param  \App\Models\Camera  $camera
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        //
        $districts = Districts::all();

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
                } else {
                    $currentLevel = CurrentLevel::where('station_id', $station->id)->first();
                    $currentLevel->update(
                        [
                            'current_level' => $stationJps->waterLevel,
                            'alert_level' => $stationJps->waterlevelStatus
                        ]
                    );
                }
            }
        }
        return response()->noContent();
    }
}
