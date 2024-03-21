@extends('layouts.master')

@section('body')

<!-- Main Content -->
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Profile</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
          <div class="breadcrumb-item">Profile</div>
        </div>
      </div>
      <div class="section-body">
        <h2 class="section-title">Hi, {{ Auth::user()->name }}</h2>
        <p class="section-lead">
          Ubah data profile kamu disini!
        </p>

        <div class="row mt-sm-12">
            <div class="card">
                <form action="{{ route('update-profile') }}" class="needs-validation" novalidate="" method="POST">
                    @csrf
                <div class="card-header">
                  <h4>Edit Profile</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                      <div class="form-group col-md-6 col-12">
                        <label>Nama</label>
                        <input type="text" class="form-control" value="{{ Auth::user()->name }}" >
                        <div class="invalid-feedback">
                          Tolong isi nama kamu!
                        </div>
                      </div>
                      <div class="form-group col-md-6 col-12">
                        <label>Email</label>
                        <input type="text" class="form-control" value="{{ Auth::user()->email }}" >
                        <div class="invalid-feedback">
                          Tolong isi email kamu!
                        </div>
                      </div>
                    </div>
                    <div class="row">
                    </div>
                    <br>
                </div>
                <div class="card-footer text-right">
                  <button class="btn btn-primary">Simpan Perubahan</button>
                </div>
              </form>
          </div>
          <div class="card-footer text-left">
            <label>Ingin hapus akun?</label><br>
            <button class="btn btn-danger">Hapus akun saya</button>
          </div>
        </div>
      </div>
    </section>
  </div>

    </section>
</div>



@endsection


