@extends('layouts.master')

@section('body')

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Data Kalkulasi</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Modules</a></div>
                <div class="breadcrumb-item">DataTables</div>
            </div>
        </div>
        <div class="row">
              <div class="card">
                <form action="{{ route('admin/update-kalkulasi',$kalkulasi->id) }}" class="needs-validation" novalidate="" method="POST">
                    @csrf
                  <div class="card-body">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" id="kalkulasis" name="kalkulasis" class="form-control"  value="{{ $kalkulasi->kalkulasis }}">
                      </div>
                      <div class="form-group">
                        <label>Ketinggian Tempat</label>
                        <input type="text" id="altitude" name="altitude" class="form-control" value="{{ $kalkulasi->altitude }}">
                      </div>
                      <div class="form-group">
                          <label>Curah Hujan</label>
                          <input type="text" id="rainfall" name="rainfall" class="form-control" value="{{ $kalkulasi->rainfall }}">
                        </div>
                        <div class="form-group">
                          <label>Penyinaran Matahari</label>
                          <input type="text" id="solar_radiation" name="solar_radiation" class="form-control" value="{{ $kalkulasi->solar_radiation }}">
                        </div>
                        <div class="form-group">
                          <label>pH Tanah</label>
                          <input type="text" id="ph_soil" name="ph_soil" class="form-control" value="{{ $kalkulasi->ph_soil }}">
                        </div>
                        <div class="form-group">
                          <label>Temperature</label>
                          <input type="text" id="temperature" name="temperature" class="form-control" value="{{ $kalkulasi->temperature }}">
                        </div>
                      <div class="form-group">
                        <label>Kelembapan</label>
                        <input type="text" id="humidity" name="humidity" class="form-control" value="{{ $kalkulasi->humidity }}">
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


