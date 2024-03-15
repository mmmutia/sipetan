<?php

namespace App\Imports;

use App\Models\PhSoil;
use App\Models\Altitude;
use App\Models\Rainfall;
use App\Models\Subdistrict;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class SubdistrictAllImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
{

    foreach ($rows as $key => $row) {
        // Skip the header row
        if ($key === 0) {
            continue;
        }

        // Extract data from the current row
        $number = $row[0];
        $subdistrictName = $row[1];
        $Altitude = $row[2];
        $Rainfall = $row[3];
        $SolarRadiation = $row[4];
        $PhSoil = $row[5];
        $Temperature = $row[6];
        $Humidity = $row[7];



        // Create or update the Subdistrict
        $subdistrict = Subdistrict::updateOrCreate([
            'subdistrict' => $subdistrictName,
            'altitude' => $Altitude,
            'rainfall' => $Rainfall,
            'solar_radiation' => $SolarRadiation,
            'ph_soil' => $PhSoil,
            'temperature' => $Temperature,
            'humidity' => $Humidity,

        ]);

    }
}


}
