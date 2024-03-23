@extends('layouts.master')

@section('body')

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Kriteria</h1>
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
                            data-bs-target="#add-kriteria">Tambah Data</button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            #
                                        </th>
                                        <th>Nama</th>
                                        <th>Bobot</th>
                                        <th>Keterangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kriteria as $data)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>{{ $data->name }}</td>
                                            <td>{{ $data->bobot }}</td>
                                            <td>{{ $data->description }}</td>
                                            <td>
                                                    <div class="d-flex align-items-center">
                                                        <a class="btn btn-primary btn-action mr-1" href="/edit-kriteria,{{ $data->id }}" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                                        {{-- <a href="#edit-kriteria{{ $data->id }}" data-toggle="modal" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a> --}}
                                                        <form action="delete-kriteria,{{ $data->id }}" method="POST" class="ml-2">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button class="btn btn-danger btn-action confirm_delete"><i class="fas fa-trash"></i></button>
                                                        </form>
                                                    </div>

                                            </td>
                                        </tr>
                                        <!-- Modal Edit-->
                                        @if($kriteria->isEmpty())
                                        <p>Error!</p>
                                        @else
                                        <div class="modal fade center-modal" id="edit-kriteria{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit kriteria</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">

                                                    <form action="{{ route('/update-kriteria',$data->id) }}" class="needs-validation" novalidate="" method="POST">
                                                        @csrf
                                                        <div class="card-body">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Nama</label>
                                                            <div class="col-sm-9">
                                                                <select class="form-control" id="name" name="name">
                                                                    <option {{ $data->name == 'Ketinggian Tempat' ? 'selected' : '' }}>Ketinggian Tempat</option>
                                                                    <option {{ $data->name == 'Curah Hujan' ? 'selected' : '' }}>Curah Hujan</option>
                                                                    <option {{ $data->name == 'Penyinaran Matahari' ? 'selected' : '' }}>Penyinaran Matahari</option>
                                                                    <option {{ $data->name == 'pH Tanah' ? 'selected' : '' }}>Curah Hujan</option>
                                                                    <option {{ $data->name == 'Temperature' ? 'selected' : '' }}>Temperature</option>
                                                                    <option {{ $data->name == 'Kelembapan' ? 'selected' : '' }}>Kelembapan</option>
                                                                </select>
                                                            <div class="invalid-feedback">
                                                                Tolong isi Nama Kriteria!
                                                            </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Bobot</label>
                                                            <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="bobot" name="bobot" required="" value="{{ $data->bobot }}">
                                                            <div class="invalid-feedback">
                                                                Tolong isi Bobot Kriteria!
                                                            </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Keterangan</label>
                                                            <div class="col-sm-9">
                                                                <select class="form-control" id="description" name="description">
                                                                    <option {{ $data->description == 'Benefit' ? 'selected' : '' }}>Benefit</option>
                                                                    <option {{ $data->description == 'Cost' ? 'selected' : '' }}>Cost</option>
                                                                </select>
                                                            <div class="invalid-feedback">
                                                                Tolong isi Keterangan Kriteria!
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
                                        @endif
                                        @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </section>
</div>

<!-- Modal Add-->
<div class="modal fade center-modal" id="add-kriteria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah kriteria</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/save-kriteria" class="needs-validation" novalidate="" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="name" name="name" required>
                                    <option>-- Pilih Kriteria --</option>
                                    <option>Ketinggian Tempat</option>
                                    <option>Curah Hujan</option>
                                    <option>Penyinaran Matahari</option>
                                    <option>pH Tanah</option>
                                    <option>Temperature</option>
                                    <option>Kelembapan</option>
                                </select>
                                <div class="invalid-feedback">
                                    Tolong isi Nama Kriteria!
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Bobot </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="bobot" name="bobot" required>
                                <div class="invalid-feedback">
                                    Tolong isi Bobot Kriteria!
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Keterangan</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="description" name="description" required>
                                    <option>-- Pilih Keterangan --</option>
                                    <option>Benefit</option>
                                    <option>Cost</option>
                                </select>
                                <div class="invalid-feedback">
                                    Tolong isi Keterangan Kriteria!
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



@endsection




