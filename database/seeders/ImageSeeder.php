<?php

namespace Database\Seeders;

use App\Models\Image;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csvFile = fopen(base_path("database/data/images.csv"), "r");
  
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, "|")) !== FALSE) {
            if (!$firstline) {
                Image::create([
                    "id" => $data[0],
                    "image_url" => $data[1],
                    "facility_id" => $data[2],
                ]);    
            }
            $firstline = false;
        }
   
        fclose($csvFile);
    }
}
