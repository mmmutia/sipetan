@extends('layouts.master')

@section('body')

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Dashboard</h1>
          </div>
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="far fa-map"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Kecamatan</h4>
                  </div>
                  <div class="card-body">
                    {{ \App\Models\Subdistrict::count() }}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="far fa-circle"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Tanaman Pangan</h4>
                  </div>
                  <div class="card-body">
                    {{ \App\Models\Kalkulasi::count() }}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon bg-warning">
                    <i class="far fa-file"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Kriteria</h4>
                    </div>
                    <div class="card-body">
                        {{ \App\Models\Kriteria::count() }}
                    </div>
                  </div>
                </div>
              </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                  <i class="fas fa-user"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Pengguna</h4>
                  </div>
                  <div class="card-body">
                    {{ \App\Models\User::count() }}
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-12 col-sm-12 col-lg-12">
              <div class="card">
                <div class="card-body">
                    <div class="summary-item">
                      <h6 class="mt-3">Total Sektor Tanaman Pangan <span class="text-muted">({{ \App\Models\Kalkulasi::count() }} Jenis)</span></h6>
                      <ul class="list-unstyled list-unstyled-border">
                        <li class="media">
                          <a href="#">
                            <img alt="image" class="mr-3 rounded" width="50" src="assets/img/products/product-4-50.png">
                          </a>
                          <div class="media-body">
                            <div class="media-right">
                                @if(\App\Models\Comparison::where('result', 'padi')->count() > 0)
                                    {{ \App\Models\Comparison::where('result', 'padi')->count() }} Kecamatan
                                @else
                                    Tidak ada data!
                                @endif
                            </div>
                            <div class="media-title">Tanaman Padi</div>
                            <div class="text-small text-muted">Tahun<div class="bullet"></div> 2021</div>
                          </div>
                        </li>
                        <li class="media">
                          <a href="#">
                            <img alt="image" class="mr-3 rounded" width="50" src="assets/img/products/product-1-50.png">
                          </a>
                          <div class="media-body">
                            <div class="media-right">
                                @if(\App\Models\Comparison::where('result', 'jagung')->count() > 0)
                                {{ \App\Models\Comparison::where('result', 'jagung')->count() }} Kecamatan
                            @else
                                Tidak ada data!
                            @endif
                            </div>
                            <div class="media-title">Tanaman Jagung</div>
                            <div class="text-small text-muted">Tahun<div class="bullet"></div> 2021</div>
                          </div>
                        </li>
                        <li class="media">
                          <a href="#">
                            <img alt="image" class="mr-3 rounded" width="50" src="assets/img/products/product-2-50.png">
                          </a>
                          <div class="media-body">
                            <div class="media-right">
                                @if(\App\Models\Comparison::where('result', 'kedelai')->count() > 0)
                                {{ \App\Models\Comparison::where('result', 'kedelai')->count() }} Kecamatan
                            @else
                                Tidak ada data!
                            @endif
                            </div>
                            <div class="media-title">Tanaman Kedelai</div>
                            <div class="text-muted text-small">Tahun<div class="bullet"></div> 2021
                            </div>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>

        </section>
      </div>

@endsection
