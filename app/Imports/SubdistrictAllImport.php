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
        $altitudeValue = $row[2];
        $phSoilValue = $row[3];


        // Create or update the Subdistrict
        $subdistrict = Subdistrict::updateOrCreate([
            'subdistrict' => $subdistrictName,
        ]);

        // Create or update the Altitude
        $altitude = Altitude::updateOrCreate([
            'subdistrict_id' => $subdistrict->id,
            'altitude' => $altitudeValue,
        ]);

        // Create or update the pH Soil
        $phSoil = PhSoil::updateOrCreate([
            'subdistrict_id' => $subdistrict->id,
            'ph_soil' => $phSoilValue,
        ]);

    }
}


}
