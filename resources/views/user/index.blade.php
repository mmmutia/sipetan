@extends('layouts.master-landingpage')
@section('body')

    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <div class="container-fluid sticky-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light p-0">
                <a href="/" class="navbar-brand">
                    <h2 class="text-white">SIPETAN</h2>
                </a>
                <button type="button" class="navbar-toggler ms-auto me-0" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">
                        <a href="/" class="nav-item nav-link active">Beranda</a>
                        <a href="/about" class="nav-item nav-link">Tentang</a>
                        <a href="/plant" class="nav-item nav-link">Tanaman Pangan</a>
                    </div>
                    <a href="/login" class="btn btn-dark py-2 px-4 d-none d-lg-inline-block">Login</a>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Hero Start -->
    <div class="container-fluid bg-primary hero-header mb-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 text-center text-lg-start">
                    <h1 class="display-5 text-white animated slideInRight">Sistem Pendukung keputusan Pemilihan<span class="fw-light text-dark"> Jenis Tanaman Pangan</span> Berdasarkan Lahan</h1>
                    <p class="text-white mb-4 animated slideInRight">di Banyuwangi</p>
                    <a href="/plant" class="btn btn-dark py-2 px-4 me-3 animated slideInRight">Lihat Tanaman</a>
                    <a href="" class="btn btn-outline-dark py-2 px-4 animated slideInRight">Video Tutorial Penggunaan</a>
                </div>
                <div class="col-lg-6">
                    <img class="img-fluid animated pulse infinite" src="landing-page/img/home.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->

    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <img class="img-fluid animated pulse infinite" src="landing-page/img/home-1.png">
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <h1 class="text-primary mb-4">SIPETAN <span class="fw-light text-dark">adalah
                            Solusi</span></h1>
                    <p class="mb-4">SIPETAN digunakan untuk membantu petani dalam menentukan pemilihan
                        jenis tanaman pangan yang lebih tepat dan berpotensi meningkatkan produktivitas
                        pertanian di Kabupaten Banyuwangi dengan penggunaan metode TOPSIS.</p>
                    <p class="mb-4">Dengan SIPETAN ini petani ataupun masyrakat diharapkan dapat lebih memudahkan dalam memiliki jenis tanaman pangan dan merekomendasikan tanaman pangan yang sesuai dengan kondisi lahan.</p>
                    <a class="btn btn-primary py-2 px-4" href="/plant">Lihat Tanaman</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


