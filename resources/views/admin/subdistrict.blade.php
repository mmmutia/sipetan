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
                    <div class="card-header">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#add-subdistrict">Tambah Data</button>&nbsp;&nbsp;&nbsp;
                            <a href="/admin/export-subdistrict"><button type="button" class="btn btn-primary" style="margin-right: 10px;"><i class="fas fa-file-export"></i> Export Kecamatan</button></a>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#import-subdistrict"><i class="fas fa-file-import"></i> Import Kecamatan</button>
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
                                        <th>Keterangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($subdistricts as $data)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>{{ $data->subdistrict }}</td>
                                            <td></td>
                                            <td>
                                                <div class="icon-container">
                                                {{-- <a href="#" data-bs-toggle="modal" data-bs-target="#edit-activity" data-id="{{ $data->id }}"><i class="fas fa-edit"></i></a> --}}
                                                <a href="/admin/edit-subdistrict-{{ $data->id }}" class="edit-button" data-bs-toggle="modal" data-bs-target="#edit-subdistrict">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="/admin/delete-subdistrict-{{ $data->id }}" class="confirm-button" ><i class="fas fa-trash-alt" style="color: red"></i></a>
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
    <div class="modal fade center-modal" id="add-subdistrict" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Kecamatan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/admin/save-subdistrict" class="needs-validation" novalidate="" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nama </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="subdistrict" name="subdistrict" required>
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

    <!-- Modal Import-->
    <div class="modal fade center-modal" id="import-subdistrict" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Import Data Kecamatan</h5>
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
                                        (.xlxs)
                                    </label>
                                    <label class="col-sm-12 col-form-label">- Data yang akan ditambahkan yaitu Kecamatan, Ketinggian Tempat dan pH Tanah
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="/admin/downloadtemplate-subdistrict" class="btn btn-info mb-2">Unduh Template</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


   <!-- Modal Edit-->
    <div class="modal fade center-modal" id="edit-subdistrict" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Kecamatan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if($subdistricts->isEmpty())
                    <form action="#" class="needs-validation" novalidate="" method="POST">
                        @csrf
                        <div class="card-body">
                          <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nama </label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="name" name="name" required="" value="">
                              <div class="invalid-feedback">
                                Tolong isi Nama Kegiatan!
                              </div>
                            </div>
                          </div>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                      </form>
                    @else
                    <form action="{{ route('admin/update-subdistrict',$data->id) }}" class="needs-validation" novalidate="" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                          <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nama </label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="subdistrict" name="subdistrict" required="" value="{{ $data->subdistrict }}">
                              <div class="invalid-feedback">
                                Tolong isi Nama Kecamatan!
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
