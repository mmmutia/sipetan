@extends('layouts.master-auth')

@section('body')
<section class="section">
    <div class="container mt-5">
      <div class="row">
        <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">


          <div class="card card-primary">
            <div class="card-header text-center"><h4>Register</h4></div>

            <div class="card-body">
                <form action="/simpanregistrasi" class="needs-validation" novalidate="" method="POST">
                    @csrf
                <div class="row">
                  <div class="form-group col-12">
                    <label for="frist_name">Nama</label>
                    <input id="name" type="text" class="form-control" name="name" autofocus>
                  </div>
                </div>

                <div class="form-group">
                  <label for="email">Email</label>
                  <input id="email" type="email" class="form-control" name="email">
                  <div class="invalid-feedback">
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-6">
                    <label for="password" class="d-block">Password</label>
                    <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password">
                    <div id="pwindicator" class="pwindicator">
                      <div class="bar"></div>
                      <div class="label"></div>
                    </div>
                  </div>
                  <div class="form-group col-6">
                    <label for="password2" class="d-block">Konfirmasi Password</label>
                    <input id="password2" type="password" class="form-control" name="password-confirm">
                  </div>
                </div>

                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-lg btn-block">
                    Register
                  </button>
                  <div class="mt-5 text-muted text-center">
                    Sudah punya akun? <a href="/login">Login</a>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
