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
                            <table class="table table-striped" id="table-1">
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
                            <table class="table table-striped" id="table-1">
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
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Kecamatan</th>
                                        <th>D+</th>
                                        <th>D-</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($kalkulasi as $key => $data)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $data->kalkulasis }}</td>
                                        <td>{{ isset($d_plus_values[$data->id]) ? $d_plus_values[$data->id] : 'N/A' }}</td>
                                        <td>{{ isset($d_min_values[$data->id]) ? $d_min_values[$data->id] : 'N/A' }}</td>
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
                        <h2>Tabel Hasil Preferensi dan Rangking</h2>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-2">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Kecamatan</th>
                                        <th>Preferensi</th>
                                        <th>Ranking</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   {{-- Buat array untuk menyimpan hasil perhitungan --}}
                                <?php $rankings = []; ?>

                                {{-- Loop melalui setiap kecamatan --}}
                                @foreach ($kalkulasi as $data)
                                    {{-- Perhitungan D+/ (D+ + D-) --}}
                                    <?php
                                        $preference = $d_min_values[$data->id] / ($d_min_values[$data->id] + $d_plus_values[$data->id]);
                                    ?>

                                    {{-- Simpan hasil perhitungan ke dalam array --}}
                                    <?php $rankings[] = ['kalkulasis' => $data->kalkulasis, 'preference' => $preference]; ?>
                                @endforeach

                                {{-- Urutkan array berdasarkan preferensi dari yang terbesar ke terkecil --}}
                                <?php
                                    usort($rankings, function($a, $b) {
                                        return $b['preference'] <=> $a['preference'];
                                    });
                                ?>

                                {{-- Tampilkan hasil perhitungan D+/ (D+ + D-) dalam bentuk tabel --}}
                                @foreach ($rankings as $ranking)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $ranking['kalkulasis'] }}</td>
                                        <td>{{ $ranking['preference'] }}</td>
                                        <td class="text-center bold">{{ $loop->iteration }}</td>
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

