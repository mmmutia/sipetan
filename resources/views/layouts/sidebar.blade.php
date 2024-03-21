<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="index.html">SIPETAN</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="/">St</a>
      </div>
      <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class=active><a class="nav-link" href="/home"><i class="fas fa-fire"></i>Dashboard</a></li>
        @if (auth()->user()->level=="admin")
        <li class="menu-header">DATA</li>
        <li><a class="nav-link" href="/admin/kriteria"><i class="fas fa-th"></i> <span>Data Kriteria</span></a></li>
        <li class="dropdown">
            <a href="/admin/kalkulasi" class="nav-link has-dropdown"><i class="fas fa-ellipsis-h"></i><span>Data Kalkulasi</span></a>
            <ul class="dropdown-menu">
              <li class=active><a class="nav-link" href="/admin/kalkulasi">Data Kalkulasi</a></li>
              <li><a class="nav-link" href="/hitung-kal">Perhitungan</a></li>
            </ul>
        </li>
        <li><a class="nav-link" href="/admin/subdistrict"><i class="fas fa-pencil-ruler"></i> <span>Data Alternatif</span></a></li>
        <li><a class="nav-link" href="/perhitungan"><i class="fas fa-calculator"></i> <span>Perhitungan</span></a></li>
        <li><a class="nav-link" href="/hasil"><i class="fas fa-file-alt"></i> <span>Hasil</span></a></li>
         <li><a class="nav-link" href="/comparison"><i class="fas fa-plug"></i> <span>Perbandingan</span></a></li>
        <li class="menu-header">USER</li>
        <li><a class="nav-link" href="/admin/users"><i class="far fa-user"></i> <span>Data User</span></a></li>
        @endif
        <li class="menu-header">DATA</li>
        <li><a class="nav-link" href="/comparison"><i class="fas fa-plug"></i> <span>Hasil Penilaian</span></a></li>
        {{-- <li><a class="nav-link" href="/history"><i class="fas fa-file-alt"></i> <span>Riwayat</span></a></li> --}}


      {{-- <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
        <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
          <i class="fas fa-rocket"></i> Documentation
        </a>
      </div>         --}}
    </aside>
  </div>
