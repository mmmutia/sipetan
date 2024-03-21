<?php

namespace App\Http\Controllers;

use App\Models\Subdistrict;
use Illuminate\Http\Request;
use App\Exports\SubdistrictExport;
use App\Exports\SubdistrictImport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SubdistrictTemplateExport;
use App\Imports\SubdistrictAllImport;
use App\Imports\SubdistrictImport as ImportsSubdistrictImport;
use App\Models\Kriteria;
use App\Models\Preverensi;

class SubsidtrictController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subdistricts = Subdistrict::all();
        return view('admin/subdistrict',compact('subdistricts'));
    }

    public function perhitungan()
    {
        $subdistricts = Subdistrict::all();
        return view('admin/perhitungan',compact('subdistricts'));
    }

    public function hasil()
    {
        // Ambil nilai preferensi dari database
        $preferences = Preverensi::orderByDesc('preverensi')->get();
        // $preferences = Preverensi::all();
        return view('admin.hasil', compact('preferences'));
    }

    public function pembagi(Request $request)
    {
        $subdistricts = Subdistrict::all();


        $results = [];
        $bobots = [];
        $hasil_max = [];
        $hasil_min = [];
        $d_plus = [];
        $preference = [];

        $sum_of_altitude = 0;
        $sum_of_rainfall = 0;
        $sum_of_solar_radiation = 0;
        $sum_of_ph_soil = 0;
        $sum_of_temperature = 0;
        $sum_of_humidity = 0;
        $plus = 0;
        $min = 0;

        foreach ($subdistricts as $data) {
            $sum_of_altitude += pow($data->altitude, 2);
            $sum_of_rainfall += pow($data->rainfall, 2);
            $sum_of_solar_radiation += pow($data->solar_radiation, 2);
            $sum_of_ph_soil += pow($data->ph_soil, 2);
            $sum_of_temperature += pow($data->temperature, 2);
            $sum_of_humidity += pow($data->humidity, 2);
        }

        $result1 = sqrt($sum_of_altitude);
        $result2 = sqrt($sum_of_rainfall);
        $result3 = sqrt($sum_of_solar_radiation);
        $result4 = sqrt($sum_of_ph_soil);
        $result5 = sqrt($sum_of_temperature);
        $result6 = sqrt($sum_of_humidity);

        // Menggunakan array untuk menyimpan hasil
        $results['result1'] = $result1;
        $results['result2'] = $result2;
        $results['result3'] = $result3;
        $results['result4'] = $result4;
        $results['result5'] = $result5;
        $results['result6'] = $result6;

        foreach ($subdistricts as $data) {
            // Mendapatkan nilai kriteria yang sesuai untuk setiap variabel
            $kriteria_altitude = Kriteria::where('name', 'ketinggian tempat')->first();
            $kriteria_rainfall = Kriteria::where('name', 'curah hujan')->first();
            $kriteria_solar_radiation = Kriteria::where('name', 'penyinaran matahari')->first();
            $kriteria_ph_soil = Kriteria::where('name', 'ph tanah')->first();
            $kriteria_temperature = Kriteria::where('name', 'temperature')->first();
            $kriteria_humidity = Kriteria::where('name', 'kelembapan')->first();

            // Melakukan perhitungan bobot untuk setiap variabel
            $bobot_altitude = ($data->altitude / $results['result1']) * $kriteria_altitude->bobot;
            $bobot_rainfall = ($data->rainfall / $results['result2']) * $kriteria_rainfall->bobot;
            $bobot_solar_radiation = ($data->solar_radiation / $results['result3']) * $kriteria_solar_radiation->bobot;
            $bobot_ph_soil = ($data->ph_soil / $results['result4']) * $kriteria_ph_soil->bobot;
            $bobot_temperature = ($data->temperature / $results['result5']) * $kriteria_temperature->bobot;
            $bobot_humidity = ($data->humidity / $results['result6']) * $kriteria_humidity->bobot;

            // Simpan bobot ke dalam array
            $bobots[$data->id] = [
                'bobot_altitude' => $bobot_altitude,
                'bobot_rainfall' => $bobot_rainfall,
                'bobot_solar_radiation' => $bobot_solar_radiation,
                'bobot_ph_soil' => $bobot_ph_soil,
                'bobot_temperature' => $bobot_temperature,
                'bobot_humidity' => $bobot_humidity,
            ];
        }

        foreach ($subdistricts as $data) {
            // Mendapatkan nilai kriteria yang sesuai untuk setiap variabel
            $hasil_altitude = Kriteria::where('description', 'cost')->first();
            $hasil_rainfall = Kriteria::where('description', 'benefit')->first();
            $hasil_solar_radiation = Kriteria::where('description', 'benefit')->first();
            $hasil_ph_soil = Kriteria::where('description', 'benefit')->first();
            $hasil_temperature = Kriteria::where('description', 'cost')->first();
            $hasil_humidity = Kriteria::where('description', 'benefit')->first();
        // Simpan hasil perhitungan maksimum (benefit) ke dalam array
        // Simpan hasil perhitungan maksimum (benefit) ke dalam array
        $hasil_max = [
            'bobot_altitude' => ($hasil_altitude->description == 'benefit') ? max(array_column($bobots, 'bobot_altitude')) : min(array_column($bobots, 'bobot_altitude')),
            'bobot_rainfall' => ($hasil_rainfall->description == 'cost') ? min(array_column($bobots, 'bobot_rainfall')) : max(array_column($bobots, 'bobot_rainfall')),
            'bobot_solar_radiation' => ($hasil_solar_radiation->description == 'cost') ? min(array_column($bobots, 'bobot_solar_radiation')) : max(array_column($bobots, 'bobot_solar_radiation')),
            'bobot_ph_soil' => ($hasil_ph_soil->description == 'cost') ? min(array_column($bobots, 'bobot_ph_soil')) : max(array_column($bobots, 'bobot_ph_soil')),
            'bobot_temperature' => ($hasil_temperature->description == 'benefit') ? max(array_column($bobots, 'bobot_temperature')) : min(array_column($bobots, 'bobot_temperature')),
            'bobot_humidity' => ($hasil_humidity->description == 'cost') ? min(array_column($bobots, 'bobot_humidity')) : max(array_column($bobots, 'bobot_humidity')),
        ];

        // Simpan hasil perhitungan minimum (cost) ke dalam array
        $hasil_min = [
            'bobot_altitude' => ($hasil_altitude->description == 'benefit') ? min(array_column($bobots, 'bobot_altitude')) : max(array_column($bobots, 'bobot_altitude')),
            'bobot_rainfall' => ($hasil_rainfall->description == 'cost') ? max(array_column($bobots, 'bobot_rainfall')) : min(array_column($bobots, 'bobot_rainfall')),
            'bobot_solar_radiation' => ($hasil_solar_radiation->description == 'cost') ? max(array_column($bobots, 'bobot_solar_radiation')) : min(array_column($bobots, 'bobot_solar_radiation')),
            'bobot_ph_soil' => ($hasil_ph_soil->description == 'cost') ? max(array_column($bobots, 'bobot_ph_soil')) : min(array_column($bobots, 'bobot_ph_soil')),
            'bobot_temperature' => ($hasil_temperature->description == 'benefit') ? min(array_column($bobots, 'bobot_temperature')) : max(array_column($bobots, 'bobot_temperature')),
            'bobot_humidity' => ($hasil_humidity->description == 'cost') ? max(array_column($bobots, 'bobot_humidity')) : min(array_column($bobots, 'bobot_humidity')),
        ];


        // Menghitung D+

        $d_plus_values = [];

        $d_min_values = [];

        // Loop melalui setiap kecamatan
        foreach ($subdistricts as $data) {
            // Perhitungan bobot untuk setiap variabel
            // ...

            // Perhitungan D+ untuk setiap kecamatan
            $sum_of_squares = pow($hasil_max['bobot_altitude'] - $bobots[$data->id]['bobot_altitude'], 2) +
                             pow($hasil_max['bobot_rainfall'] - $bobots[$data->id]['bobot_rainfall'], 2) +
                             pow($hasil_max['bobot_solar_radiation'] - $bobots[$data->id]['bobot_solar_radiation'], 2) +
                             pow($hasil_max['bobot_ph_soil'] - $bobots[$data->id]['bobot_ph_soil'], 2) +
                             pow($hasil_max['bobot_temperature'] - $bobots[$data->id]['bobot_temperature'], 2) +
                             pow($hasil_max['bobot_humidity'] - $bobots[$data->id]['bobot_humidity'], 2);

            $result_d_plus = sqrt($sum_of_squares);

            // Simpan hasil perhitungan D+ untuk setiap kecamatan
            $d_plus_values[$data->id] = $result_d_plus;
        }

        // Gunakan $d_plus_values sesuai kebutuhan di aplikasi Anda
        // dd($d_plus_values);

        // Loop melalui setiap kecamatan
        foreach ($subdistricts as $data) {
            // Perhitungan bobot untuk setiap variabel
            // ...

            // Perhitungan D+ untuk setiap kecamatan
            $sum_of_squares = pow($bobots[$data->id]['bobot_altitude'] - $hasil_min['bobot_altitude'], 2) +
                            pow( $bobots[$data->id]['bobot_rainfall'] - $hasil_min['bobot_rainfall'], 2) +
                            pow($bobots[$data->id]['bobot_solar_radiation']- $hasil_min['bobot_solar_radiation'], 2) +
                            pow($bobots[$data->id]['bobot_ph_soil'] - $hasil_min['bobot_ph_soil'], 2) +
                            pow( $bobots[$data->id]['bobot_temperature'] - $hasil_min['bobot_temperature'], 2) +
                            pow($bobots[$data->id]['bobot_humidity'] - $hasil_min['bobot_humidity'], 2);

            $result_d_min = sqrt($sum_of_squares);

            // Simpan hasil perhitungan D+ untuk setiap kecamatan
            $d_min_values[$data->id] = $result_d_min;
        }

        Preverensi::truncate();
       // Loop melalui setiap kecamatan
        foreach ($subdistricts as $data) {
        // Perhitungan D+/ (D+ + D-)
        $preference_value = $d_min_values[$data->id] / ($d_min_values[$data->id] + $d_plus_values[$data->id]);

        // Simpan hasil perhitungan preferensi untuk setiap kecamatan
        $preferences[$data->id] = $preference_value;

            // Simpan hasil preferensi ke dalam database
            $preference = new Preverensi();
            $preference->subdistrict_id = $data->id; // Sesuaikan dengan nama kolom ID kecamatan
            $preference->preverensi = $preference_value;
            $preference->save();

        }


        return view('admin/perhitungan', ['results' => $results, 'bobots' => $bobots, 'hasil_max' => $hasil_max, 'hasil_min' => $hasil_min, 'd_plus_values' => $d_plus_values, 'd_min_values' => $d_min_values, 'subdistricts' => $subdistricts]);
        // return $results;
        }
    }

    public function alternatif()
    {
        $subdistricts = Subdistrict::all();
        return view('admin/alternatif',compact('subdistricts'));
    }

    public function subdistrictexport(){
        return Excel::download(new SubdistrictExport, 'data_alternatif.xlsx');
    }


    public function subdistrictimport(Request $request){
        $file = $request->file('file');
        $nameFile = $file->getClientOriginalName();
        $file->move('Subdistrict', $nameFile);

        Excel::import(new SubdistrictAllImport, public_path("/Subdistrict/".$nameFile));
        return redirect('admin/subdistrict');
    }

    public function downloadTemplate()
    {
        return Excel::download(new SubdistrictTemplateExport, 'data_kecamatan_template.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/subdistrict');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Subdistrict::create([
            'subdistrict'=>$request->subdistrict,
            'altitude'=>$request->altitude,
            'rainfall'=>$request->rainfall,
            'solar_radiation'=>$request->solar_radiation,
            'ph_soil'=>$request->ph_soil,
            'temperature'=>$request->temperature,
            'humidity'=>$request->humidity,
        ]);
        return redirect('admin/subdistrict')->withSuccess('Data berhasil ditambah!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subdistrict $subdistrict, string $id)
    {
        // $this->authorize('update', $subdistrict);
        $subdistrict = Subdistrict::findorfail($id);
        return view('admin/edit-subdistrict', compact('subdistrict'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $subdistricts = Subdistrict::findorfail($id);
        $subdistricts->update($request->all());

        return redirect('admin/subdistrict')->withInfo('Data berhasil di update!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subdistrict $subdistrict, string $id)
    {
        $subdistrict = Subdistrict::findorfail($id);
        $subdistrict->delete();

        return back()->withWarning('Data berhasil dihapus!');
    }

    public function deleteAllData()
    {
        // Hapus semua data dari tabel menggunakan metode truncate()
        Preverensi::truncate();

        return redirect()->back()->withSuccess('Data berhasil di refresh!');
    }


}
