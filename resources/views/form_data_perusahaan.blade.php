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
              <h5 class="card-title text-center">Form Data Perusahaan</h5>

              <form action="{{$action}}" class="row g-3" method="post" enctype="multipart/form-data">
                @csrf
                <div class="col-12" >
                  <label for="" class="form-label">Logo Perusahaan</label>
                  @if(file_exists("storage/".$perusahaans->foto_perusahaan))
                  <img src="/storage/{{ $perusahaans->foto_perusahaan }}" alt="" width="100" height="100"><br>
                  @endif
                  <input type="file" class="form-control" name="foto_perusahaan" id="inputEmail4" value="{{$perusahaans->foto_perusahaan}}" >
                </div>

                <div class="col-12">
                    <label for="" class="form-label">Nama Perusahaan</label>
                    <input type="text" class="form-control" name="nama_perusahaan" value="{{$perusahaans->nama_perusahaan}}">
                </div>
                <div class="col-12">
                    <label for="" class="form-label">Deskripsi</label>
                    <input type="text" class="form-control quill-editor-default" name="deskripsi" value="{{$perusahaans->deskripsi}}">
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