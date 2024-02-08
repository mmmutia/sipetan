<?php

namespace App\Imports;

use App\Models\Subdistrict;
use Maatwebsite\Excel\Concerns\ToModel;

class SubdistrictImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Subdistrict([
            'subdistrict' => $row[1],
        ]);
    }
}
