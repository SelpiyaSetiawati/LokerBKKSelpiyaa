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
              <h5 class="card-title text-center">Form Data Alumni</h5>

              <form action="{{$action}}" class="row g-3" method="post" enctype="multipart/form-data">

                @csrf
                <div class="col-12">
                    <label for="" class="form-label">Nis</label>
                    <input type="text" class="form-control" name="nis" value="{{$users->nis}}" >
                </div>
                <div class="col-12">
                    <label for="" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" name="nama" value="{{$users->nama}}" >
                </div>
                <div class="col-12">
                    <label for="" class="form-label">Email</label>
                    <input type="text" class="form-control" name="email" value="{{$users->email}}">
                </div>
                <div class="col-12">
                    <label for="" class="form-label">Tahun Lulus</label>
                    <input type="date" class="form-control" name="tahun_lulus" value="{{$users->tahun_lulus}}">
                </div>
                <div class="col-12" >
                  <label for="" class="form-label">Status</label>
                  <select name="status"class="form-control" id="">{{$users->status}}
                    <option value="Draft">Draft</option>
                    <option value="Accepted">Accepted</option>
                    <option value="Rejected">Rejected</option>
                  </select>
                </div>
                <div class="text-center mt-5 py-5">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>

            </div>
          </div>

          
         

        </div>
      </div>
    </section>


@endsection