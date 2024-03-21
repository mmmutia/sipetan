@extends('layouts.master')

@section('body')

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Data Kriteria</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Modules</a></div>
                <div class="breadcrumb-item">DataTables</div>
            </div>
        </div>
        <div class="row">
              <div class="card">
                <form action="{{ route('admin/update-kriteria',$kriteria->id) }}" class="needs-validation" novalidate="" method="POST">
                    @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label>Nama</label>
                      <input type="text" id="name" name="name" class="form-control"  value="{{ $kriteria->name }}">
                    </div>
                    <div class="form-group">
                      <label>Bobot</label>
                      <input type="text" id="bobot" name="bobot" class="form-control" value="{{ $kriteria->bobot }}">
                    </div>
                    <div class="form-group">
                      <label>Keterangan</label>
                      <select class="form-control" id="description" name="description">
                        <option {{ $kriteria->description == 'Benefit' ? 'selected' : '' }}>Benefit</option>
                        <option {{ $kriteria->description == 'Cost' ? 'selected' : '' }}>Cost</option>
                    </select>
                    </div>
                  </div>
                  <div class="card-footer text-right">
                    <a href="/admin/kriteria"><button class="btn btn-secondary">Batal</button></a>
                    <button class="btn btn-primary">Simpan</button>
                  </div>
                </form>
              </div>
         </div>

    </section>
</div>



@endsection


