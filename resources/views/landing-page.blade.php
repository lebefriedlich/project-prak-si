<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>
        PilihAsdos - Sistem Pendukung Keputusan Pemilihan Asisten Dosen
    </title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />

    <!-- Favicons -->
    <link href="{{ asset('images/logo.png') }}" rel="icon" />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />

    <!-- Vendor CSS Files -->
    <link href="{{ asset('vendor/bootstrap v5.3.1/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor/aos 2/aos.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet" />

    <!-- Main CSS File -->
    <link href="{{ asset('css/main.css') }} " rel="stylesheet" />
</head>

<body class="index-page">
    <header id="header" class="header sticky-top">
        <div class="branding d-flex align-items-cente">
            <div class="container position-relative d-flex align-items-center justify-content-between">
                <a href="index.html" class="logo d-flex align-items-center">
                    <img src="{{ asset('images/logo.png') }}" alt="" />
                    <h1 class="sitename">PilihAsdos</h1>
                </a>

                <nav id="navmenu" class="navmenu">
                    <ul>
                        <li><a href="#hero" class="active">Home</a></li>
                        <li><a href="#about">Tentang</a></li>
                        <li><a href="#bobotPerKriteria">Bobot Kriteria</a></li>
                        <li><a href="#formData">Form Data Alternatif</a></li>
                        <li><a href="#hasilKeputusan">Hasil Keputusan</a></li>
                    </ul>
                    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
                </nav>
            </div>
        </div>
    </header>

    <main class="main">
        <!-- Hero Section -->
        <section id="hero" class="hero section light-background">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center"
                        data-aos="zoom-out">
                        <h1>Welcome to <span>PilihAsdos</span></h1>
                        <p>
                            Kita Adalah Sistem Pendukung Keputusan Untuk Memilih Asisten
                            Dosen
                        </p>
                        <div class="d-flex">
                            <a href="#about" class="btn-get-started">Mulai</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Hero Section -->

        <!-- About Section -->
        <section id="about" class="about section light-background py-5">
            <!-- Section Title -->
            <div class="container section-title text-center mb-4" data-aos="fade-up">
                <h2 class="fw-bold text-primary">Tentang Kami</h2>
                <p class="text-muted">
                    <span>Cari Tahu Lebih Lanjut</span>
                    <span class="description-title d-block fs-5">Tentang Kami</span>
                </p>
            </div>
            <!-- End Section Title -->

            <div class="container">
                <div class="row gy-5 align-items-center">
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                        <img src="{{ asset('images/about.jpg') }}" alt="Tentang Kami"
                            class="img-fluid rounded shadow" />
                    </div>

                    <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up"
                        data-aos-delay="200">
                        <div class="about-content ps-0 ps-lg-3">
                            <h3 class="text-primary fw-bold">PilihAsdos</h3>
                            <p class="fst-italic text-muted">
                                Sistem Pendukung Keputusan Pemilihan Asisten Dosen adalah
                                aplikasi inovatif yang dirancang untuk membantu pengguna dalam
                                menentukan asisten dosen yang paling sesuai berdasarkan
                                kriteria yang telah ditentukan. Dengan menggunakan metode
                                <strong>Simple Additive Weighting (SAW)</strong>, aplikasi ini memfasilitasi
                                proses pengambilan keputusan yang lebih objektif dan terukur.
                                Manfaat utama dari aplikasi ini termasuk penghematan waktu
                                dalam evaluasi, peningkatan akurasi dalam pemilihan, serta
                                transparansi dalam proses pengambilan keputusan.
                            </p>
                            <h4 class="mt-4 text-primary">Fitur Utama</h4>
                            <ul class="list-unstyled">
                                <li class="d-flex align-items-start mb-3">
                                    <i class="bi bi-plus-circle text-success fs-4 me-3"></i>
                                    <div>
                                        <p class="text-muted">
                                            <strong>Input Kriteria dan Alternatif:</strong> Pengguna dapat dengan
                                            mudah memasukkan kriteria penilaian dan daftar asisten
                                            dosen yang akan dinilai, memungkinkan proses penilaian
                                            yang disesuaikan dengan kebutuhan spesifik. Form input yang disediakan akan
                                            dikonversi secara otomatis menggunakan nilai bobot yang tercantum pada tabel
                                            di bawah ini, sehingga setiap kriteria yang dimasukkan akan diubah menjadi
                                            skor numerik sesuai dengan bobot penilaian yang telah ditetapkan.
                                        </p>
                                    </div>
                                </li>
                                <li class="d-flex align-items-start mb-3">
                                    <i class="bi bi-calculator text-warning fs-4 me-3"></i>
                                    <div>
                                        <p class="text-muted">
                                            <strong>Proses Perhitungan Menggunakan Metode SAW:</strong> Aplikasi ini
                                            menerapkan metode SAW untuk menghitung skor dari setiap
                                            alternatif berdasarkan bobot kriteria yang telah
                                            ditentukan, sehingga memberikan hasil yang akurat dan
                                            valid.
                                        </p>
                                    </div>
                                </li>
                                <li class="d-flex align-items-start mb-3">
                                    <i class="bi bi-star text-info fs-4 me-3"></i>
                                    <div>
                                        <p class="text-muted">
                                            <strong>Hasil Rekomendasi Asisten Dosen Terbaik:</strong> Setelah proses
                                            perhitungan selesai, pengguna akan menerima rekomendasi
                                            asisten dosen terbaik yang diurutkan berdasarkan skor,
                                            membantu mereka membuat keputusan yang lebih baik dan
                                            informatif.
                                        </p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /About Section -->

        <hr>
        <!-- Section for Criteria and Weights -->
        <section id="bobotPerKriteria" class="section py-5">
            <div class="container">
                <div class="section-title text-center mb-4" data-aos="fade-up">
                    <h2 class="fw-bold text-primary">Bobot Setiap Kriteria</h2>
                    <p class="text-muted">Detail bobot untuk setiap kriteria dalam perhitungan pemilihan asisten dosen.
                    </p>
                </div>

                <!-- Card Layout for IPK Weights -->
                <h3 class="mt-4 text-primary text-center">Bobot Berdasarkan IPK</h3>
                <div class="row mt-3 justify-content-center">
                    <div class="col-lg-2 col-md-3 col-sm-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="card shadow-sm border-0 h-100">
                            <div class="card-body text-center">
                                <h5 class="card-title text-success">3,81 – 4,00</h5>
                                <p class="card-text fs-4 fw-bold">5</p>
                                <p class="text-muted">Sangat Baik</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="card shadow-sm border-0 h-100">
                            <div class="card-body text-center">
                                <h5 class="card-title text-primary">3,51 – 3,80</h5>
                                <p class="card-text fs-4 fw-bold">4</p>
                                <p class="text-muted">Baik</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-6 mb-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="card shadow-sm border-0 h-100">
                            <div class="card-body text-center">
                                <h5 class="card-title text-info">3,31 – 3,50</h5>
                                <p class="card-text fs-4 fw-bold">3</p>
                                <p class="text-muted">Cukup</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-6 mb-4" data-aos="fade-up" data-aos-delay="400">
                        <div class="card shadow-sm border-0 h-100">
                            <div class="card-body text-center">
                                <h5 class="card-title text-warning">3,00 – 3,30</h5>
                                <p class="card-text fs-4 fw-bold">2</p>
                                <p class="text-muted">Kurang</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-6 mb-4" data-aos="fade-up" data-aos-delay="500">
                        <div class="card shadow-sm border-0 h-100">
                            <div class="card-body text-center">
                                <h5 class="card-title text-danger">0 - 3,00</h5>
                                <p class="card-text fs-4 fw-bold">1</p>
                                <p class="text-muted">Sangat Kurang</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card Layout for Test Weights -->
                <h3 class="mt-5 text-primary text-center">Bobot Tes Kemampuan dan Kriteria Lainnya</h3>
                <div class="row mt-3 justify-content-center">
                    <div class="col-lg-2 col-md-3 col-sm-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="card shadow-sm border-0 h-100">
                            <div class="card-body text-center">
                                <h5 class="card-title text-success">86 – 100</h5>
                                <p class="card-text fs-4 fw-bold">5</p>
                                <p class="text-muted">Sangat Baik</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="card shadow-sm border-0 h-100">
                            <div class="card-body text-center">
                                <h5 class="card-title text-primary">76 – 85</h5>
                                <p class="card-text fs-4 fw-bold">4</p>
                                <p class="text-muted">Baik</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-6 mb-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="card shadow-sm border-0 h-100">
                            <div class="card-body text-center">
                                <h5 class="card-title text-info">66 – 75</h5>
                                <p class="card-text fs-4 fw-bold">3</p>
                                <p class="text-muted">Cukup</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-6 mb-4" data-aos="fade-up" data-aos-delay="400">
                        <div class="card shadow-sm border-0 h-100">
                            <div class="card-body text-center">
                                <h5 class="card-title text-warning">51 – 65</h5>
                                <p class="card-text fs-4 fw-bold">2</p>
                                <p class="text-muted">Kurang</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-6 mb-4" data-aos="fade-up" data-aos-delay="500">
                        <div class="card shadow-sm border-0 h-100">
                            <div class="card-body text-center">
                                <h5 class="card-title text-danger">0 - 50</h5>
                                <p class="card-text fs-4 fw-bold">1</p>
                                <p class="text-muted">Sangat Kurang</p>
                            </div>
                        </div>
                    </div>
                </div>

                <h3 class="mt-5 text-primary text-center">Nilai Vektor Bobot Kriteria</h3>
                <div class="row mt-3 justify-content-center">
                    <div class="col-lg-2 col-md-3 col-sm-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="card shadow-sm border-0 h-100">
                            <div class="card-body text-center">
                                <h5 class="card-title text-primary">IPK</h5>
                                <p class="card-text fs-4 fw-bold">3</p>
                                <p class="text-muted">Tingkat Kepentingan</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="card shadow-sm border-0 h-100">
                            <div class="card-body text-center">
                                <h5 class="card-title text-primary">Tes Pemrograman</h5>
                                <p class="card-text fs-4 fw-bold">2</p>
                                <p class="text-muted">Tingkat Kepentingan</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-6 mb-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="card shadow-sm border-0 h-100">
                            <div class="card-body text-center">
                                <h5 class="card-title text-primary">Kemampuan Mengajar</h5>
                                <p class="card-text fs-4 fw-bold">2</p>
                                <p class="text-muted">Tingkat Kepentingan</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-6 mb-4" data-aos="fade-up" data-aos-delay="400">
                        <div class="card shadow-sm border-0 h-100">
                            <div class="card-body text-center">
                                <h5 class="card-title text-primary">Nilai Referensi</h5>
                                <p class="card-text fs-4 fw-bold">2</p>
                                <p class="text-muted">Tingkat Kepentingan</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-6 mb-4" data-aos="fade-up" data-aos-delay="500">
                        <div class="card shadow-sm border-0 h-100">
                            <div class="card-body text-center">
                                <h5 class="card-title text-primary">Kerja Sama</h5>
                                <p class="card-text fs-4 fw-bold">3</p>
                                <p class="text-muted">Tingkat Kepentingan</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Optional: Additional explanation -->
                <p class="text-muted mt-4 text-center">
                    Bobot ini digunakan sebagai dasar dalam proses perhitungan pemilihan asisten dosen berdasarkan
                    kriteria yang relevan, seperti yang dijelaskan dalam referensi:
                    <a href="https://doi.org/10.35957/jatisi.v7i1.221" target="_blank">Penggunaan Metode SAW untuk
                        Pemilihan Asisten Dosen</a>.
                </p>
            </div>
        </section>

        <hr>
        <!-- Form Data Section -->
        <section id="formData" class="about section light-background">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Form Data Alternatif</h2>
                <p>
                    <span>Masukkan</span>
                    <span class="description-title">Data Alternatif Kalian</span>
                </p>
            </div>
            <!-- End Section Title -->

            <div class="container">
                <form id="multiInputForm" action="{{ route('get-data') }}" method="POST">
                    <!-- Container for Dynamic Input Sets -->
                    @csrf
                    <div id="dynamicInputContainer">
                        <!-- Initial Set of Input Fields -->
                        <div class="input-set">
                            <h6>Data ke-1</h6>
                            <div class="form-group">
                                <label for="nama0">Nama</label>
                                <input type="text" class="form-control" id="nama0" name="nama[]" />
                            </div>
                            <div class="form-group mt-3">
                                <label for="c10">IPK</label>
                                <input type="number" step="0.01" class="form-control" id="c10"
                                    name="c1[]" />
                            </div>
                            <div class="form-group mt-3">
                                <label for="c20">Nilai Tes Pemrograman</label>
                                <input type="number" step="0.01" class="form-control" id="c20" name="c2[]" />
                            </div>
                            <div class="form-group mt-3">
                                <label for="c30">Nilai Kemampuan Mengajar</label>
                                <input type="number" step="0.01" class="form-control" id="c30" name="c3[]" />
                            </div>
                            <div class="form-group mt-3">
                                <label for="c40">Nilai Referensi</label>
                                <input type="number" step="0.01" class="form-control" id="c40" name="c4[]" />
                            </div>
                            <div class="form-group mt-3">
                                <label for="c50">Nilai Kerja Sama</label>
                                <input type="number" step="0.01" class="form-control" id="c50" name="c5[]" />
                            </div>
                            <hr />
                        </div>
                    </div>
                    <!-- Button to Add New Input Set -->
                    <div class="mt-3">
                        <button type="button" class="btn btn-secondary" id="addInputSetButton">
                            Tambah Data Alternatif
                        </button>
                        <button type="submit" class="btn btn-primary">
                            Selesai & Hitung
                        </button>
                    </div>
                </form>
            </div>
        </section>
        <!-- /Form Data Section -->

        <hr>
        <!-- Hasil Keputusan Section -->
        <section id="hasilKeputusan" class="about section light-background py-5">
            <!-- Section Title -->
            <div class="container section-title text-center" data-aos="fade-up">
                <h2 class="display-5 fw-bold">Hasil Keputusan</h2>
            </div>
            <!-- End Section Title -->

            <!-- Main Content -->
            <div class="container" data-aos="fade-up">
                @if (session()->has('bobot_hasil'))
                    <!-- Input Data Kriteria -->
                    <div class="card shadow-sm mb-4">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0">Input Data Kriteria untuk Peserta</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-hover">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Nama</th>
                                        <th>IPK (C1)</th>
                                        <th>Tes Pemrograman (C2)</th>
                                        <th>Kemampuan Mengajar (C3)</th>
                                        <th>Nilai Referensi (C4)</th>
                                        <th>Kerja Sama (C5)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (session('bobot_hasil') as $nama => $item)
                                        <tr>
                                            <td>{{ $nama }}</td>
                                            <td>{{ $item['c1'] }}</td>
                                            <td>{{ $item['c2'] }}</td>
                                            <td>{{ $item['c3'] }}</td>
                                            <td>{{ $item['c4'] }}</td>
                                            <td>{{ $item['c5'] }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Bobot Kriteria -->
                    <div class="card shadow-sm mb-4">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0">Nilai Min/Max Value</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-hover">
                                <thead class="table-dark">
                                    <tr>
                                        <th>IPK (C1)</th>
                                        <th>Tes Pemrograman (C2)</th>
                                        <th>Kemampuan Mengajar (C3)</th>
                                        <th>Nilai Referensi (C4)</th>
                                        <th>Kerja Sama (C5)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ session('minmax_value')[1] ?? 'N/A' }}</td>
                                        <td>{{ session('minmax_value')[2] ?? 'N/A' }}</td>
                                        <td>{{ session('minmax_value')[3] ?? 'N/A' }}</td>
                                        <td>{{ session('minmax_value')[4] ?? 'N/A' }}</td>
                                        <td>{{ session('minmax_value')[5] ?? 'N/A' }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Normalisasi Nilai Kriteria -->
                    <div class="card shadow-sm mb-4">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0">Normalisasi Nilai Kriteria</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-hover">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Nama</th>
                                        <th>IPK (C1)</th>
                                        <th>Tes Pemrograman (C2)</th>
                                        <th>Kemampuan Mengajar (C3)</th>
                                        <th>Nilai Referensi (C4)</th>
                                        <th>Kerja Sama (C5)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (session('normalisasi_scores') as $nama => $item)
                                        <tr>
                                            <td>{{ $nama }}</td>
                                            <td>{{ $item['c1'] }}</td>
                                            <td>{{ $item['c2'] }}</td>
                                            <td>{{ $item['c3'] }}</td>
                                            <td>{{ $item['c4'] }}</td>
                                            <td>{{ $item['c5'] }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Hasil Skor Akhir -->
                    <div class="card shadow-sm mb-4">
                        <div class="card-header bg-success text-white">
                            <h5 class="mb-0">Hasil Skor Akhir</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-hover">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Nama</th>
                                        <th>Total Skor</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (session('hasil_bobot') as $nama => $score)
                                        <tr>
                                            <td>{{ $nama }}</td>
                                            <td>{{ $score }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Peringkat Akhir -->
                    <div class="card shadow-sm mb-4">
                        <div class="card-header bg-warning text-dark">
                            <h5 class="mb-0">Peringkat Akhir</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-hover">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Peringkat</th>
                                        <th>Nama</th>
                                        <th>Nilai</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (session('ranking') as $rank => $item)
                                        <tr>
                                            <td>{{ ++$rank }}</td>
                                            <td>{{ $item['nama'] }}</td>
                                            <td>{{ $item['nilai'] }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @else
                    <div class="alert alert-info text-center">
                        <strong>Informasi:</strong> Silakan masukkan data alternatif pada form di atas untuk
                        melanjutkan proses perhitungan.
                    </div>
                @endif
            </div>
            <!-- End Main Content -->
        </section>

        <!-- /Hasil Keputusan Section -->
    </main>

    <footer id="footer" class="footer">
        <div class="container copyright text-center mt-4">
            <p>
                © <span>Copyright</span>
                <strong class="px-1 sitename">PilihAsdos</strong>
                <span>All Rights Reserved</span>
            </p>
            <div class="credits">
                Designed by
                <a href="https://www.linkedin.com/in/maulana-haekal/" target="_blank">Maulana Haekal Noval Akbar</a>
            </div>
        </div>
    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('vendor/bootstrap v5.3.1/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('vendor/aos 2/aos.js') }}"></script>
    <script src="{{ asset('vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('vendor/waypoints/noframework.waypoints.js') }}"></script>
    <script src="{{ asset('vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script>
        let setCount = 1;

        $("#addInputSetButton").click(function() {
            setCount++;
            $("#dynamicInputContainer").append(`
          <div class="input-set">
                <h6>Data ke-${setCount}</h6>
                <div class="form-group">
                  <label for="nama${setCount}">Nama</label>
                  <input
                    type="text"
                    class="form-control"
                    id="nama${setCount}"
                    name="nama[]"
                  />
                </div>
                <div class="form-group mt-3">
                  <label for="c1${setCount}">IPK</label>
                  <input
                    type="number"
                    step="0.01"
                    class="form-control"
                    id="c1${setCount}"
                    name="c1[]"
                  />
                </div>
                <div class="form-group mt-3">
                  <label for="c2${setCount}">Nilai Tes Pemrograman</label>
                  <input
                    type="number"
                    step="0.01" 
                    class="form-control"
                    id="c2${setCount}"
                    name="c2[]"
                  />
                </div>
                <div class="form-group mt-3">
                  <label for="c3${setCount}">Nilai Kemampuan Mengajar</label>
                  <input
                    type="number"
                    step="0.01" 
                    class="form-control"
                    id="c3${setCount}"
                    name="c3[]"
                  />
                </div>
                <div class="form-group mt-3">
                  <label for="c4${setCount}">Nilai Referensi</label>
                  <input
                    type="number"
                    step="0.01" 
                    class="form-control"
                    id="c4${setCount}"
                    name="c4[]"
                  />
                </div>
                <div class="form-group mt-3">
                  <label for="c5${setCount}">Nilai Kerja Sama</label>
                  <input
                    type="number"
                    step="0.01" 
                    class="form-control"
                    id="c5${setCount}"
                    name="c5[]"
                  />
                </div>
                <hr />
              </div>
            </div>
        `);
        });
    </script>

    <!-- Main JS File -->
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
