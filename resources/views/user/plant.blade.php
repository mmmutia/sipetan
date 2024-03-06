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
                        <a href="/" class="nav-item nav-link">Beranda</a>
                        <a href="/about" class="nav-item nav-link">Tentang</a>
                        <a href="/plant" class="nav-item nav-link active">Tanaman Pangan</a>
                    </div>
                    <a href="/login" class="btn btn-dark py-2 px-4 d-none d-lg-inline-block">Login</a>
                </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Hero Start -->
    <div class="container-fluid bg-primary hero-header mb-5">
        <div class="container text-center">
            <h1 class="display-4 text-white mb-3 animated slideInDown">Tanaman Pangan</h1>
            <p class="text-white">Tanaman pangan yaitu semua model tanaman yang di dalamnya ada karbohidrat serta protein sebagai sumber daya manusia.</p>
        </div>
    </div>
    <!-- Hero End -->

    <!-- Padi Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
                <h2 class="text-primary mb-3">Tanaman Padi<span class="fw-light text-dark"> (Oriza Sativa)</span></h2>
                <p class="mb-5">
                    Padi, tanaman pangan utama di Asia, tumbuh di daerah berair atau rawa dengan morfologi batang buluh tinggi, daun lebar, dan malai bunga kecil.  Padi memiliki peran kunci dalam ketahanan pangan global dan perekonomian banyak negara.</p>
            </div>
            <div class="row g-4 align-items-center">
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.3s">
                    <div class="row g-5">
                        <div class="col-12 d-flex">
                            <div class="btn-square rounded-circle border flex-shrink-0"
                                style="width: 80px; height: 80px;">
                                <i class="fa fa-check fa-2x text-primary"></i>
                            </div>
                            <div class="ps-3">
                                <h5>Nama Ilmiah</h5>
                                <hr class="w-25 bg-primary my-2">
                                <span>Oryza Sativa</span>
                            </div>
                        </div>
                        <div class="col-12 d-flex">
                            <div class="btn-square rounded-circle border flex-shrink-0"
                                style="width: 80px; height: 80px;">
                                <i class="fa fa-check fa-2x text-primary"></i>
                            </div>
                            <div class="ps-3">
                                <h5>Asal Usul</h5>
                                <hr class="w-25 bg-primary my-2">
                                <span>Berasal dari Asia dan merupakan tanaman pangan utama di banyak negara di kawasan tersebut.</span>
                            </div>
                        </div>
                        <div class="col-12 d-flex">
                            <div class="btn-square rounded-circle border flex-shrink-0"
                                style="width: 80px; height: 80px;">
                                <i class="fa fa-check fa-2x text-primary"></i>
                            </div>
                            <div class="ps-3">
                                <h5>Siklus Hidup</h5>
                                <hr class="w-25 bg-primary my-2">
                                <span>Merupakan tanaman tahunan yang melibatkan fase tanam, pertumbuhan vegetatif, pembentukan malai bunga, pembuahan, dan pematangan butir padi.</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                    <img class="img-fluid animated pulse infinite" src="landing-page/img/padi.png">
                </div>
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.5s">
                    <div class="row g-5">
                        <div class="col-12 d-flex">
                            <div class="btn-square rounded-circle border flex-shrink-0"
                                style="width: 80px; height: 80px;">
                                <i class="fa fa-check fa-2x text-primary"></i>
                            </div>
                            <div class="ps-3">
                                <h5>Jenis Habitat</h5>
                                <hr class="w-25 bg-primary my-2">
                                <span>Biasanya tumbuh di daerah berair atau rawa, tetapi dapat juga ditanam di lahan kering dengan pengairan yang cukup.</span>
                            </div>
                        </div>
                        <div class="col-12 d-flex">
                            <div class="btn-square rounded-circle border flex-shrink-0"
                                style="width: 80px; height: 80px;">
                                <i class="fa fa-check fa-2x text-primary"></i>
                            </div>
                            <div class="ps-3">
                                <h5>Morfologi Tanaman</h5>
                                <hr class="w-25 bg-primary my-2">
                                <span>Memiliki batang buluh yang tinggi, daun panjang dan lebar, serta malai bunga yang berisi bunga-bunga kecil.</span>
                            </div>
                        </div>
                        <div class="col-12 d-flex">
                            <div class="btn-square rounded-circle border flex-shrink-0"
                                style="width: 80px; height: 80px;">
                                <i class="fa fa-check fa-2x text-primary"></i>
                            </div>
                            <div class="ps-3">
                                <h5>Varietas</h5>
                                <hr class="w-25 bg-primary my-2">
                                <span>Ciherang, Mekongga, IR 64, Inpari 32 HBD, Situ Bagendit, dan masih banyak lagi.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Padi End -->

    <!-- Jagung Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
                <h2 class="text-primary mb-3">Tanaman Jagung<span class="fw-light text-dark"> (Zea Mays)</span></h2>
                <p class="mb-5">Jagung (Zea mays) merupakan tanaman sereal yang berasal dari Amerika dengan batang tegak, daun lebar, dan tassel sebagai bagian bunga jantan. Sebagai salah satu tanaman pangan dan pakan ternak utama di dunia, jagung memiliki peran penting dalam mendukung ketahanan pangan global.</p>
            </div>
            <div class="row g-4 align-items-center">
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.3s">
                    <div class="row g-5">
                        <div class="col-12 d-flex">
                            <div class="btn-square rounded-circle border flex-shrink-0"
                                style="width: 80px; height: 80px;">
                                <i class="fa fa-check fa-2x text-primary"></i>
                            </div>
                            <div class="ps-3">
                                <h5>Nama Ilmiah</h5>
                                <hr class="w-25 bg-primary my-2">
                                <span>Zea Mays</span>
                            </div>
                        </div>
                        <div class="col-12 d-flex">
                            <div class="btn-square rounded-circle border flex-shrink-0"
                                style="width: 80px; height: 80px;">
                                <i class="fa fa-check fa-2x text-primary"></i>
                            </div>
                            <div class="ps-3">
                                <h5>Asal Usul</h5>
                                <hr class="w-25 bg-primary my-2">
                                <span>Tanaman Jagung Berasal dari Amerika.</span>
                            </div>
                        </div>
                        <div class="col-12 d-flex">
                            <div class="btn-square rounded-circle border flex-shrink-0"
                                style="width: 80px; height: 80px;">
                                <i class="fa fa-check fa-2x text-primary"></i>
                            </div>
                            <div class="ps-3">
                                <h5>Siklus Hidup</h5>
                                <hr class="w-25 bg-primary my-2">
                                <span>Jagung merupakan tanaman tahunan dengan siklus hidup melibatkan fase tanam, pertumbuhan vegetatif, pembentukan tassel dan malai jagung, penyerbukan, dan pembuahan.</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                    <img class="img-fluid animated pulse infinite" src="landing-page/img/jagung.png">
                </div>
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.5s">
                    <div class="row g-5">
                        <div class="col-12 d-flex">
                            <div class="btn-square rounded-circle border flex-shrink-0"
                                style="width: 80px; height: 80px;">
                                <i class="fa fa-check fa-2x text-primary"></i>
                            </div>
                            <div class="ps-3">
                                <h5>Jenis Habitat</h5>
                                <hr class="w-25 bg-primary my-2">
                                <span>Jagung tumbuh baik di lahan dengan sinar matahari cukup dan dapat beradaptasi dengan berbagai jenis habitat.</span>
                            </div>
                        </div>
                        <div class="col-12 d-flex">
                            <div class="btn-square rounded-circle border flex-shrink-0"
                                style="width: 80px; height: 80px;">
                                <i class="fa fa-check fa-2x text-primary"></i>
                            </div>
                            <div class="ps-3">
                                <h5>Morfologi Tanaman</h5>
                                <hr class="w-25 bg-primary my-2">
                                <span>Morfologi tanaman jagung melibatkan batang tegak, daun lebar, dan tassel sebagai bagian bunga jantan.</span>
                            </div>
                        </div>
                        <div class="col-12 d-flex">
                            <div class="btn-square rounded-circle border flex-shrink-0"
                                style="width: 80px; height: 80px;">
                                <i class="fa fa-check fa-2x text-primary"></i>
                            </div>
                            <div class="ps-3">
                                <h5>Varietas</h5>
                                <hr class="w-25 bg-primary my-2">
                                <span>Bisi 18, Bisi 2, NK 212, P 27, P 21, Bisi 226, NK 22, Bisma, Bisi 816, dan masih bayak lagi.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Jagung End -->

    <!-- Kedelai Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
                <h2 class="text-primary mb-3">Tanaman Kedelai<span class="fw-light text-dark"> (Glycine Max)</span></h2>
                <p class="mb-5">Kedelai (Glycine max) adalah tanaman legum dengan buah polong yang berasal dari Asia Timur. Tanaman ini memiliki nilai ekonomi tinggi sebagai bahan baku pangan, minyak, dan pakan ternak.</p>
            </div>
            <div class="row g-4 align-items-center">
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.3s">
                    <div class="row g-5">
                        <div class="col-12 d-flex">
                            <div class="btn-square rounded-circle border flex-shrink-0"
                                style="width: 80px; height: 80px;">
                                <i class="fa fa-check fa-2x text-primary"></i>
                            </div>
                            <div class="ps-3">
                                <h5>Nama Ilmiah</h5>
                                <hr class="w-25 bg-primary my-2">
                                <span>Glycine Max</span>
                            </div>
                        </div>
                        <div class="col-12 d-flex">
                            <div class="btn-square rounded-circle border flex-shrink-0"
                                style="width: 80px; height: 80px;">
                                <i class="fa fa-check fa-2x text-primary"></i>
                            </div>
                            <div class="ps-3">
                                <h5>Asal Usul</h5>
                                <hr class="w-25 bg-primary my-2">
                                <span>Kedelai berasal dari Asia Timur</span>
                            </div>
                        </div>
                        <div class="col-12 d-flex">
                            <div class="btn-square rounded-circle border flex-shrink-0"
                                style="width: 80px; height: 80px;">
                                <i class="fa fa-check fa-2x text-primary"></i>
                            </div>
                            <div class="ps-3">
                                <h5>Siklus Hidup</h5>
                                <hr class="w-25 bg-primary my-2">
                                <span>Siklus hidup kedelai melibatkan fase tanam, pertumbuhan vegetatif, pembentukan bunga, pembuahan dalam polong, dan pematangan biji.</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                    <img class="img-fluid animated pulse infinite" src="landing-page/img/kedelai.png">
                </div>
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.5s">
                    <div class="row g-5">
                        <div class="col-12 d-flex">
                            <div class="btn-square rounded-circle border flex-shrink-0"
                                style="width: 80px; height: 80px;">
                                <i class="fa fa-check fa-2x text-primary"></i>
                            </div>
                            <div class="ps-3">
                                <h5>Jenis Habitat</h5>
                                <hr class="w-25 bg-primary my-2">
                                <span>Kedelai dapat tumbuh di berbagai jenis tanah dan sering ditanam di lahan pertanian.</span>
                            </div>
                        </div>
                        <div class="col-12 d-flex">
                            <div class="btn-square rounded-circle border flex-shrink-0"
                                style="width: 80px; height: 80px;">
                                <i class="fa fa-check fa-2x text-primary"></i>
                            </div>
                            <div class="ps-3">
                                <h5>Morfologi Tanaman</h5>
                                <hr class="w-25 bg-primary my-2">
                                <span>Tanaman kedelai memiliki daun trifoliate dan menghasilkan buah berupa polong yang berisi biji</span>
                            </div>
                        </div>
                        <div class="col-12 d-flex">
                            <div class="btn-square rounded-circle border flex-shrink-0"
                                style="width: 80px; height: 80px;">
                                <i class="fa fa-check fa-2x text-primary"></i>
                            </div>
                            <div class="ps-3">
                                <h5>Vaietas</h5>
                                <hr class="w-25 bg-primary my-2">
                                <span>Anjasmoro, Wilis, Argomulyo, Baluran, Grobogan, Burangrang, Dena 1, dan masih banyak lagi.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Kedelai End -->
