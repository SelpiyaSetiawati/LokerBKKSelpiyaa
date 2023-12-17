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
              <h5 class="card-title text-center">Form Data Posting</h5>

              <form action="/posting/create" class="row g-3" method="post" enctype="multipart/form-data">
                @csrf
                <div class="col-12">
                    <label for="" class="form-label">Nama Perusahaan</label>
                    <input type="text" class="form-control" name="nama_perusahaan" >
                </div>
                <div class="col-12">
                    <label for="" class="form-label">Bidang Usaha</label>
                    <input type="text" class="form-control" name="bidang_usaha" >
                </div>
                <div class="col-12">
                    <label for="" class="form-label">Alamat</label>
                    <input type="text" class="form-control" name="alamat" >
                </div>
                <div class="col-12">
                    <label for="" class="form-label">Deskripsi</label>
                    <input type="text" class="form-control" name="deskripsi" >
                </div>
                <div class="col-12">
                    <label for="" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" >
                </div>
                <div class="col-12">
                    <label for="" class="form-label">Kontak</label>
                    <input type="text" class="form-control" name="kontak" >
                </div>
                <div class="col-12" >
                  <label for="" class="form-label">Foto</label>
                  <input type="file" class="form-control" name="foto_postingan" id="inputEmail4">
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