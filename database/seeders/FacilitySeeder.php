<?php

namespace Database\Seeders;

use App\Models\Facility;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csvFile = fopen(base_path("database/data/facilities.csv"), "r");
  
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, "|")) !== FALSE) {
            if (!$firstline) {
                Facility::create([
                    "id" => $data[0],
                    "name" => $data[1],
                    "description" => $data[2],
                    "address" => $data[3],
                    "price" => $data[4],
                    "category" => $data[5],
                    "open_time" => $data[6],
                    "close_time" => $data[7],
                    "quota" => $data[8],
                    "map_url" => $data[9],
                    "department_id" => $data[10],
                    "admin_id" => $data[11],
                ]);    
            }
            $firstline = false;
        }
   
        fclose($csvFile);
    }
}
