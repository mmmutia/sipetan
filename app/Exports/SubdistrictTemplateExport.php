<?php

namespace App\Exports;

use App\Models\Subdistrict;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;

class SubdistrictTemplateExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect([
            // Header
            ['No','Nama Kecamatan','Ketinggian Tempat','Curah Hujan','Penyinaran Matahari','pH Tanah','Temperature','Kelembapan'],
        ]);
    }
    public function headings(): array
    {
        return [
            'no',
            'Nama Kecamatan',
            'Ketinggian Tempat',
            'Curah Hujan',
            'Penyinaran Matahari',
            'pH Tanah',
            'Temperature',
            'Kelembapan',
        ];
    }
}
