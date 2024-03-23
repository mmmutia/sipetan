@extends('layouts.master')

@section('body')

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Kalkulasi</h1>
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
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#add-kalkulasi">Tambah Data</button>&nbsp;&nbsp;&nbsp;
                            <a href="/hitung-kal" id="hitungButton"><button type="button" class="btn btn-primary" style="margin-right: 10px;"><i class="fas fa-calculator"></i> Hitung</button></a>
                            {{-- <a href="#"><button type="button" class="btn btn-primary" style="margin-right: 10px;"><i class="fas fa-calculator"></i> Hitung</button></a> --}}
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            #
                                        </th>
                                        <th>Tanaman</th>
                                        <th>Ketinggian Tempat</th>
                                        <th>Curah Hujan</th>
                                        <th>Penyinaran Matahari</th>
                                        <th>pH Tanah</th>
                                        <th>Temperature</th>
                                        <th>Kelembapan </th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kalkulasi as $data)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>{{ $data->kalkulasis }}</td>
                                            <td>{{ $data->altitude }}</td>
                                            <td>{{ $data->rainfall }}</td>
                                            <td>{{ $data->solar_radiation }}</td>
                                            <td>{{ $data->ph_soil }}</td>
                                            <td>{{ $data->temperature }}</td>
                                            <td>{{ $data->humidity }}</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <a class="btn btn-primary btn-action mr-1" href="/edit-kalkulasi,{{ $data->id }}" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                                    <form action=/delete-kalkulasi,{{ $data->id }}" method="POST" class="ml-2">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="btn btn-danger btn-action confirm_delete"><i class="fas fa-trash"></i></button>
                                                    </form>
                                                </div>
                                            </td>
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
<!-- Modal Add-->
<div class="modal fade center-modal" id="add-kalkulasi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Kecamatan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/save-kalkulasi" class="needs-validation" novalidate="" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Tanaman Pangan</label>
                            <div class="col-sm-8">
                                <select class="form-control" id="kalkulasi" name="kalkulasi" required>
                                    <option value="">-- Pilih Tanaman Pangan --</option>
                                    <option value="Padi">Padi</option>
                                    <option value="Jagung">Jagung</option>
                                    <option value="Kedelai">Kedelai</option>
                                </select>

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
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

 <!-- Modal Lihat Data Alternatif-->
{{-- <div class="modal fade center-modal" id="alternatif" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            @if($kalkulasi->isEmpty())
            <p>Error!</p>
            @else
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Data Alternatif Kecamatan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="{{ route(/update-subdistrict',) }}" class="needs-validation" novalidate="" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Nama </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="altitude" name="altitude" value="" readonly>
                                <div class="invalid-feedback">
                                    Tolong isi Nama Ketinggian Tempat!
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Ketinggian Tempat </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="altitude" name="altitude" value="" readonly>
                                <div class="invalid-feedback">
                                    Tolong isi Nama Ketinggian Tempat!
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Curah Hujan </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="rainfall" name="rainfall" value="" readonly>
                                <div class="invalid-feedback">
                                    Tolong isi Nama Kecamatan!
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Penyinaran Matahari </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="solar_radiation" name="solar_radiation" value="" readonly>
                                <div class="invalid-feedback">
                                    Tolong isi Nama Kecamatan!
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">pH Tanah </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="ph_soil" name="ph_soil" required="" value="" readonly>
                                <div class="invalid-feedback">
                                    Tolong isi Nama Kecamatan!
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Temperature </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="temperature" name="temperature" value="" readonly>
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
                </form>

            </div>
            @endif
        </div>
    </div>
</div> --}}

   <!-- Modal Edit -->
{{-- <div class="modal fade" id="edit{{$data->id}}" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        @if($kalkulasi->isEmpty())
            <p>Error!</p>
            @else
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel"><i class="fa fa-edit"></i> Edit
                    Penilaian</h5>
                <button type="button" class="close" data-dismiss="modal"
                    aria-hidden="true">&times;</button>
            </div>
            <form action="{{ route('admin/update-subdistrict',$data->id) }}" method="POST">
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

    <!-- Modal Import-->
    <div class="modal fade center-modal" id="import-subdistrict" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import Pegawai</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/admin/import-subdistrict" class="needs-validation" novalidate=""
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
                                <label class="col-sm-12 col-form-label">- Format file yang di Upload dalam bentuk
                                    (.xlxs) </label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="/admin/downloadtemplate-subdistrict" class="btn btn-info mb-2">Unduh Template</a>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

