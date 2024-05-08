@extends('layouts.master')

@section('body')

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Perhitungan Kalkulasi</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Modules</a></div>
                <div class="breadcrumb-item">DataTables</div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Tabel Matriks Keputusan Ternormalisasi</h2>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Pembagi</th>
                                        <th>{{ $results['result1'] }}</th>
                                        <th>{{ $results['result2'] }} </th>
                                        <th>{{ $results['result3'] }} </th>
                                        <th>{{ $results['result4'] }} </th>
                                        <th>{{ $results['result5'] }} </th>
                                        <th>{{ $results['result6'] }} </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kalkulasi as $data)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $data->kalkulasis }}</td>
                                        <td>{{ $data->altitude / $results['result1'] }} </td>
                                        <td>{{ $data->rainfall / $results['result2'] }} </td>
                                        <td>{{ $data->solar_radiation / $results['result3'] }} </td>
                                        <td>{{ $data->ph_soil / $results['result4'] }} </td>
                                        <td>{{ $data->temperature / $results['result5'] }} </td>
                                        <td>{{ $data->humidity / $results['result6'] }} </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Tabel Matriks Keputusan Ternormalisasi dan Terbobot</h2>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-2">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Kecamatan</th>
                                        <th>Ketinggian Tempat</th>
                                        <th>Curah Hujan</th>
                                        <th>Penyinaran Matahari</th>
                                        <th>pH Tanah</th>
                                        <th>Temperature</th>
                                        <th>Kelembapan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($kalkulasi as $key => $data)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $data->kalkulasis }}</td>
                                        <td>{{ $bobots[$data->id]['bobot_altitude'] }}</td>
                                        <td>{{ $bobots[$data->id]['bobot_rainfall'] }}</td>
                                        <td>{{ $bobots[$data->id]['bobot_solar_radiation'] }}</td>
                                        <td>{{ $bobots[$data->id]['bobot_ph_soil'] }}</td>
                                        <td>{{ $bobots[$data->id]['bobot_temperature'] }}</td>
                                        <td>{{ $bobots[$data->id]['bobot_humidity'] }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Nilai Solusi Ideal Positif (Maks) dan Solusi Ideal Negatif (Min)</h2>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-6">
                                <thead>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Max</td>
                                       <td>{{ $hasil_max['bobot_altitude'] }}</td>
                                       <td>{{ $hasil_max['bobot_rainfall'] }}</td>
                                       <td>{{ $hasil_max['bobot_solar_radiation'] }}</td>
                                       <td>{{ $hasil_max['bobot_ph_soil'] }}</td>
                                       <td>{{ $hasil_max['bobot_temperature'] }}</td>
                                       <td>{{ $hasil_max['bobot_humidity'] }}</td>
                                    </tr>
                                    <tr>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                    </tr>
                                    <tr>
                                        <td>Min</td>
                                        <td>{{ $hasil_min['bobot_altitude'] }}</td>
                                       <td>{{ $hasil_min['bobot_rainfall'] }}</td>
                                       <td>{{ $hasil_min['bobot_solar_radiation'] }}</td>
                                       <td>{{ $hasil_min['bobot_ph_soil'] }}</td>
                                       <td>{{ $hasil_min['bobot_temperature'] }}</td>
                                       <td>{{ $hasil_min['bobot_humidity'] }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Tabel Nilai D+ dan D- Untuk Setiap Alternatif</h2>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-4">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Kecamatan</th>
                                        <th>D+</th>
                                        <th>D-</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($kalkulasi as $key => $data)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $data->kalkulasis }}</td>
                                        <td>{{ isset($d_plus_values[$data->id]) ? $d_plus_values[$data->id] : 'N/A' }}</td>
                                        <td>{{ isset($d_min_values[$data->id]) ? $d_min_values[$data->id] : 'N/A' }}</td>
                                        <td></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Tabel Hasil Preferensi</h2>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-5">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Kecamatan</th>
                                        <th>Preverensi</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kalkulasi as $data)
                                    <?php
                                        $preference = $d_min_values[$data->id] / ($d_min_values[$data->id] + $d_plus_values[$data->id]);
                                    ?>
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $data->kalkulasis }}</td>
                                        <td>{{ $preference }}</td>
                                        <td></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>
</div>
@endsection

