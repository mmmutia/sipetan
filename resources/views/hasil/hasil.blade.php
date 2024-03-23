@extends('layouts.master')

@section('body')

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Hasil Perhitungan</h1>
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
                        <h2>Tabel Hasil Preferensi dan Rangking</h2>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Kecamatan</th>
                                        <th>Preferensi</th>
                                        <th>Ranking</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($preferences as $data)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $data->subdistrict->subdistrict }}</td>
                                        <td>{{ $data->preverensi }}</td>
                                        <td class="text-bold">{{ $loop->iteration }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-center">
            <form action="{{ route('/save-data') }}" method="post">
                @csrf
                <!-- Isi formulir -->
                <button type="submit" class="btn badge btn-primary btn-lg" style="margin-right: 10px;"><i class="fas fa-save"></i> Perbandingan</button>
            </form>

            {{-- <a href="/comparison" method="post">
                <button type="submit" class="btn badge btn-primary btn-lg" style="margin-right: 10px;"><i class="fas fa-save"></i> Perbandingan</button>
            </a> --}}
        </div>


    </div>
</section>
@endsection

