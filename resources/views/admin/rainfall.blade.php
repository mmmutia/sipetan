@extends('layouts.master')

@section('body')

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Curah Hujan</h1>
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
                            data-bs-target="#add-activity">Tambah Kegiatan</button>
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
                                        <th>Finance Code</th>
                                        <th>Divisi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                        <tr>
                                            <td class="text-center"></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <div class="icon-container">
                                                {{-- <a href="#" data-bs-toggle="modal" data-bs-target="#edit-activity" data-id="{{ $data->id }}"><i class="fas fa-edit"></i></a> --}}
                                                <a href="#" class="edit-button" data-bs-toggle="modal" data-bs-target="#edit-activity">
                                                    <i class="fas fa-edit"></i>
                                                </a>

                                                <form method="POST" action="">
                                                    @csrf
                                                    @method('delete')
                                                    <input name="_method" type="hidden" value="DELETE">
                                                     <a href="" class="confirm-button" ><i class="fas fa-trash-alt" style="color: red"></i></a>
                                                </form>
                                                </div>
                                            </td>
                                        </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Add-->
    <div class="modal fade center-modal" id="add-activity" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Kegiatan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="#" class="needs-validation" novalidate="" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nama </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" name="name" >
                                    <div class="invalid-feedback">
                                        Tolong isi Nama Kegiatan!
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Finance Code</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="finance_code" name="finance_code" required="">
                                    <div class="invalid-feedback">
                                        Maaf, kode tidak valid.
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Divisi</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="division" name="division">
                                    {{-- <select class="form-control" name="division" id="division">
                                        @foreach ($datakegiatan as $data)
                                            <option value="{{ $data }}">{{ $data->division }}</option>
                                        @endforeach
                                    </select> --}}
                                    <div class="valid-feedback">
                                        Lengkap!
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- @include('activity.add-activity') --}}

    <!-- Modal Edit-->
    {{-- @foreach ($datakegiatan as $data) --}}
    <div class="modal fade center-modal" id="edit-activity" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Kegiatan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

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
                          <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Finance Code</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="finance_code" name="finance_code" value="">
                              <div class="invalid-feedback">
                                Maaf, Kode tidak valid.
                              </div>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Divisi</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="division" name="division" value="">
                              <div class="valid-feedback">
                                Lengkap!
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                      </form>

                    <form action="" class="needs-validation" novalidate="" method="POST">
                        @csrf
                        @method('PUT')
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
                          <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Finance Code</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="financeCode" name="financeCode" value="">
                              <div class="invalid-feedback">
                                Maaf, Kode tidak valid.
                              </div>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Divisi</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="division" name="division" value="">
                              <div class="valid-feedback">
                                Lengkap!
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                      </form>

                </div>
            </div>
        </div>
    </div>
    </section>
</div>

@endsection
