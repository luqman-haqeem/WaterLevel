<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;

class UpdateWaterLevel extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'station:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Will Scrap the latest water level in publicinfobanjir website';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $arrContextOptions = array(
            "ssl" => array(
                "verify_peer" => false,
                "verify_peer_name" => false,
            ),
        );

        // URL of the web page containing the table
        $url = 'https://publicinfobanjir.water.gov.my/aras-air/data-paras-air/aras-air-data/?state=SEL&district=ALL&station=ALL&lang=en';

        // Use file_get_contents() function to retrieve the HTML content of the web page
        $html = file_get_contents($url, false, stream_context_create($arrContextOptions));

        // Use the DOMDocument class to parse the HTML content
        $dom = new \DOMDocument();
        @$dom->loadHTML($html);

        // Use the DOMXPath class to query the HTML document for the table
        $xpath = new \DOMXPath($dom);
        $table = $xpath->query('//table')->item(0);

        // Initialize an empty array to store the data from the table
        $data = array();

        // Loop through each row of the table
        foreach ($table->getElementsByTagName('tr') as $row) {
            // Initialize an empty array to store the data for each row
            $rowData = array();

            // Loop through each cell in the row
            foreach ($row->getElementsByTagName('td') as $cell) {
                // Add the cell text to the row data array
                $rowData[] = $cell->textContent;
            }

            // Add the row data array to the main data array
            $data[] = $rowData;
        }
        // dd($data);

        foreach ($data as $key => $station) {
            if (!isset($station[0])) {
                continue;
            }
        
            $external_station_id = $station[1];
            $station_name = $station[2];
            $district = $station[3];
            $main_basin = $station[4];
            $subriver_basin = $station[5];
            $last_updated = $station[6];
            $current_water_level = $station[7];
            $normal_water_level = $station[8];
            $alert_water_level = $station[9];
            $warning_water_level = $station[10];
            $danger_water_level = $station[11];
        
            if ($current_water_level > $danger_water_level) {
                $alert_level = 1;
            } else if ($current_water_level > $warning_water_level) {
                $alert_level = 2;
            } else if ($current_water_level > $alert_water_level) {
                $alert_level = 3;
            } else {
                $alert_level = 4;
            }
        
            $station = DB::table('stations')->where('external_station_id', $external_station_id)->first();
        
            if (!$station) {
                $stationId = DB::table('stations')->insertGetId([
                    'external_station_id' => $external_station_id,
                    'station_name' => $station_name,
                    'district' => $district,
                    'main_basin' => $main_basin,
                    'subriver_basin' => $subriver_basin,
                    'normal_water_level' => $normal_water_level,
                    'alert_water_level' => $alert_water_level,
                    'warning_water_level' => $warning_water_level,
                    'danger_water_level' => $danger_water_level,
                    'created_at' => now(),
                ]);

                $inserted = DB::table('current_levels')->insert([
                    'station_id' => $stationId,
                    'current_level' => $current_water_level,
                    'alert_level' => $alert_level,
                    'updated_at' => now(),
                ]);
                
                if (!$inserted) {
                    dd("failed to insert water level");
                }
                

            } else {
                DB::table('current_levels')->updateOrInsert(
                    ['station_id' => $station->id],
                    [
                        'current_level' => $current_water_level,
                        'alert_level' => $alert_level,
                        'updated_at' => now(),
                    ]
                );
            }
        }
        $this->info('Successfully Update Station Water Level');


    }
}
