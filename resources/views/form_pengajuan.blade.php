@extends('template')
@section('content')
    

    <div class="pagetitle">
      <h1>Form Layouts</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Forms</li>
          <li class="breadcrumb-item active">Layouts</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">


          <div class="card">
            <div class="card-body">
              <h5 class="card-title text-center">Form Data Pengajuan</h5>

              <form action="/pengajuan/create" class="row g-3" method="post" enctype="multipart/form-data">
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

@endsection