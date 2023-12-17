<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>BKK SMK YPC TASIKMALAYA</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="/page/assets/img/favicon.png" rel="icon">
  <link href="/page/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Source+Sans+Pro:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/page/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/page/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/page/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="/page/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="/page/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Variables CSS Files. Uncomment your preferred color scheme -->
  <link href="/page/assets/css/variables.css" rel="stylesheet">
  <!-- <link href="/page/assets/css/variables-blue.css" rel="stylesheet"> -->
  <!-- <link href="/page/assets/css/variables-green.css" rel="stylesheet"> -->
  <!-- <link href="/page/assets/css/variables-orange.css" rel="stylesheet"> -->
  <!-- <link href="/page/assets/css/variables-purple.css" rel="stylesheet"> -->
  <!-- <link href="/page/assets/css/variables-red.css" rel="stylesheet"> -->
  <!-- <link href="/page/assets/css/variables-pink.css" rel="stylesheet"> -->

  <!-- Template Main CSS File -->
  <link href="/page/assets/css/main.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top" data-scrollto-offset="0">
    <div class="container-fluid d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center scrollto me-auto me-lg-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="/page/assets/img/logo.png" alt=""> -->
        <h1>BKK SMK YPC<span>.</span></h1>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="index.html#about">Beranda</a></li>
          <li><a class="nav-link scrollto" href="index.html#about">Tentang Kami</a></li>
          <li><a class="nav-link scrollto" href="index.html#clients">Perusahaan</a></li>
          <li><a class="nav-link scrollto" href="index.html#services">Lowongan</a></li>
          <li><a class="nav-link scrollto" href="index.html#portfolio">Portofolio</a></li>
          <li><a class="nav-link scrollto" href="index.html#recent-blog-posts">Berita</a></li>
          <li><a class="nav-link scrollto" href="index.html#contact">Kontak</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle d-none"></i>
      </nav><!-- .navbar -->

      <a class="btn-getstarted scrollto" href="{{url('/loginalumni')}}">Bergabung</a>

    </div>
  </header><!-- End Header -->


    <section class="section">
      <div class="row">


          <div class="card">
            <div class="card-body">
              <h5 class="card-title text-center">Form Data Pengajuan</h5>

              <form action="/pengajuan/tambah" class="row g-3" method="post" enctype="multipart/form-data">
                @csrf
                
                <div class="col-12">
                    <label for="" class="form-label">Nis</label>
                    <input type="text" class="form-control" name="nis">
                </div>
                <div class="col-12">
                    <label for="" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" name="nama_lengkap">
                </div>
                <div class="col-12">
                    <label for="" class="form-label">Tempat Lahir</label>
                    <input type="text" class="form-control" name="tempat_lahir">
                </div>
                <div class="col-12">
                    <label for="" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control" name="tanggal_lahir">
                </div>
                <div class="col-12">
                    <label for="" class="form-label">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="cars">
                        <option value=""></option>
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                        </select>
                </div>
                <div class="col-12">
                    <label for="" class="form-label">Tinggi Badan</label>
                    <input type="text" class="form-control" name="tb">
                </div>
                <div class="col-12">
                    <label for="" class="form-label">Berat Badan</label>
                    <input type="text" class="form-control" name="bb">
                </div>
                <div class="col-12">
                    <label for="" class="form-label">alamat</label>
                    <input type="text" class="form-control" name="alamat">
                </div>
                <div class="col-12">
                    <label for="" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email">
                </div>
                <div class="col-12">
                    <label for="" class="form-label">No Telephone</label>
                    <input type="text" class="form-control" name="no_tlp">
                </div>
                <div class="col-12">
                    <label for="" class="form-label">Persyaratan</label>
                    <input type="file" class="form-control" name="file_persyaratan" id="">
                </div>
                <div class="col-12">
                    <label for="" class="form-label">Lowongan</label>
                    <input type="text" class="form-control" name="lowongan">
                </div>
                <div class="col-12">
                    <label for="" class="form-label">Tanggal Pengajuan</label>
                    <input type="date" class="form-control" name="tgl_pengajuan">
                </div>
                <div class="text-center mt-5 py-5">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>

            </div>
          </div>

          
            </div>
          </div>

        </div>
      </div>
    </section>
