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
                            data-bs-target="#add-kriteria">Tambah Data</button>&nbsp;&nbsp;&nbsp;
                            <a href="/admin/export-kriteria"><button type="button" class="btn btn-primary" style="margin-right: 10px;"><i class="fas fa-file-export"></i> Export Kelembapan</button></a>
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
                                                <div class="icon-container">
                                                {{-- <a href="#" data-bs-toggle="modal" data-bs-target="#edit-activity" data-id="{{ $data->id }}"><i class="fas fa-edit"></i></a> --}}
                                                <a href="/admin/edit-kriteria-{{ $data->id }}" class="edit-button" data-bs-toggle="modal" data-bs-target="#edit-kriteria">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="/admin/delete-kriteria-{{ $data->id }}" class="confirm-button" ><i class="fas fa-trash-alt" style="color: red"></i></a>
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
                    <form action="/admin/save-kriteria" class="needs-validation" novalidate="" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" name="name" required>
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
                                    <select class="form-control" id="description" name="description">
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


   <!-- Modal Edit-->
    <div class="modal fade center-modal" id="edit-kriteria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit kriteria</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if($kriteria->isEmpty())
                    <p>Error!</p>
                    @else
                    <form action="{{ route('admin/update-kriteria',$data->id) }}" class="needs-validation" novalidate="" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                          <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name" required="" value="{{ $data->name }}">
                              <div class="invalid-feedback">
                                Tolong isi Nama Kriteria!
                              </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Bobot</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="bobot" name="bobot" required="" value="{{ $data->bobot }}">
                              <div class="invalid-feedback">
                                Tolong isi Bobot Kriteria!
                              </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Keterangan</label>
                            <div class="col-sm-10">
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
                      @endif
                </div>
            </div>
        </div>
    </div>


    </section>
</div>

@endsection
