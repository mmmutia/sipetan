<?php

namespace App\Exports;

use App\Models\Subdistrict;
use Maatwebsite\Excel\Concerns\FromCollection;

class SubdistrictExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Subdistrict::all();
    }
}
