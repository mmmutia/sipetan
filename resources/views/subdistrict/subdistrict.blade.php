@extends('layouts.master')

@section('body')

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Alternatif</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Modules</a></div>
                <div class="breadcrumb-item">DataTables</div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-subdistrict">Tambah Data</button>&nbsp;&nbsp;&nbsp;
                            <a href="/export-subdistrict">
                                <button type="button" class="btn btn-primary" style="margin-right: 10px;"><i class="fas fa-file-export"></i> Export Data Alternatif</button>
                            </a>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#import-subdistrict"><i class="fas fa-file-import"></i> Import Data Alternatif</button>
                        </div>
                        <div>
                            <a href="/delete-all-data" id="deleteDataButton" class="btn btn-primary" style="margin-right: 10px;">
                                <i class="fas fa-recycle"></i> Refresh
                            </a>

                            <a href="/perhitungan">
                                <button type="button" class="btn btn-primary" style="margin-right: 10px;"><i class="fas fa-calculator"></i> Hitung</button>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            #
                                        </th>
                                        <th>Nama Kecamatan</th>
                                        <th>Ketinggian Tempat</th>
                                        <th>Curah Hujan</th>
                                        <th>Penyinaran Matahari</th>
                                        <th>pH Tanah</th>
                                        <th>Temperature</th>
                                        <th>Kelembapan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($subdistricts as $data)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>{{ $data->subdistrict }}</td>
                                            <td>{{ $data->altitude }}</td>
                                            <td>{{ $data->rainfall }}</td>
                                            <td>{{ $data->solar_radiation }}</td>
                                            <td>{{ $data->ph_soil }}</td>
                                            <td>{{ $data->temperature }}</td>
                                            <td>{{ $data->humidity }}</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <a class="btn btn-primary btn-action mr-1" href="/edit-subdistrict,{{ $data->id }}" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                                    {{-- <a href="#edit-kriteria{{ $data->id }}" data-toggle="modal" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a> --}}
                                                    <form action="/delete-subdistrict,{{ $data->id }}" method="POST" class="ml-2">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="btn btn-danger btn-action confirm_delete"><i class="fas fa-trash"></i></button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>

                                        <!-- Modal Edit -->
                                        {{-- <div class="modal fade" id="edit{{ $data->id }}" tabindex="-1" role="dialog"
                                            aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                @if($subdistricts->isEmpty())
                                                    <p>Error!</p>
                                                    @else
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="myModalLabel"><i class="fa fa-edit"></i> Edit
                                                            Penilaian</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-hidden="true">&times;</button>
                                                    </div>
                                                    <form action="{{ route('/edit-subdistrict', $data->id) }}" method="POST">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Nama </label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control" id="altitude" name="altitude" value="{{ $data->subdistrict}}" readonly>
                                                                    <div class="invalid-feedback">
                                                                        Tolong isi Nama Ketinggian Tempat!
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Ketinggian Tempat </label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control" id="altitude" name="altitude" value="{{ $data->altitude }}" readonly>
                                                                    <div class="invalid-feedback">
                                                                        Tolong isi Nama Ketinggian Tempat!
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Curah Hujan </label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control" id="rainfall" name="rainfall" value="{{ $data->rainfall }}" readonly>
                                                                    <div class="invalid-feedback">
                                                                        Tolong isi Nama Kecamatan!
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Penyinaran Matahari </label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control" id="solar_radiation" name="solar_radiation" value="{{ $data->solar_radiation }}" readonly>
                                                                    <div class="invalid-feedback">
                                                                        Tolong isi Nama Kecamatan!
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">pH Tanah </label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control" id="ph_soil" name="ph_soil" required="" value="{{ $data->ph_soil }}" readonly>
                                                                    <div class="invalid-feedback">
                                                                        Tolong isi Nama Kecamatan!
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Temperature </label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control" id="temperature" name="temperature" value="{{ $data->temperature }}" readonly>
                                                                    <div class="invalid-feedback">
                                                                        Tolong isi Nama Kecamatan!
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Kelembapan </label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control" id="humidity" name="humidity" value="{{ $data->humidity }}" readonly>
                                                                    <div class="invalid-feedback">
                                                                        Tolong isi Nama Kecamatan!
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-warning" data-dismiss="modal"><i
                                                                    class="fa fa-times"></i> Batal</button>
                                                            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i>
                                                                Update</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                @endif
                                            </div>
                                        </div> --}}

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

    <!-- Modal Import-->
    <div class="modal fade center-modal" id="import-subdistrict" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import Data Alternatif</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/import-subdistrict" class="needs-validation" novalidate=""
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input type="file" class="form-control" id="file" name="file"
                                    required="">
                                <div class="invalid-feedback">
                                    Tolong upload sebuah file!
                                </div>
                                <label class="col-sm-12 col-form-label">- Unduh template dibawah terlebih dahulu </label>
                                <label class="col-sm-12 col-form-label">- Format file yang di Upload dalam bentuk
                                    (.xlxs) </label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="/downloadtemplate-subdistrict" class="btn btn-info mb-2">Unduh Template</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>

     <!-- Modal Add-->
     <div class="modal fade center-modal" id="add-subdistrict" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Alternatif</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/save-subdistrict" class="needs-validation" novalidate="" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Kecamatan </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="subdistrict" name="subdistrict" required>
                                    <div class="invalid-feedback">
                                        Tolong isi Nama Kecamatan!
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Ketinggian Tempat </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="altitude" name="altitude" required>
                                    <div class="invalid-feedback">
                                        Tolong isi Nama Ketinggian Tempat!
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Curah Hujan </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="rainfall" name="rainfall" required>
                                    <div class="invalid-feedback">
                                        Tolong isi Nama Kecamatan!
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Penyinaran Matahari </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="solar_radiation" name="solar_radiation" required>
                                    <div class="invalid-feedback">
                                        Tolong isi Nama Kecamatan!
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">pH Tanah </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="ph_soil" name="ph_soil" required>
                                    <div class="invalid-feedback">
                                        Tolong isi Nama Kecamatan!
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Temperature </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="temperature" name="temperature" required>
                                    <div class="invalid-feedback">
                                        Tolong isi Nama Kecamatan!
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Kelembapan </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="humidity" name="humidity" required>
                                    <div class="invalid-feedback">
                                        Tolong isi Nama Kecamatan!
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

@endsection



