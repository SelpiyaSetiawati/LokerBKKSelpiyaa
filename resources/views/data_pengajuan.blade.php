@extends('template')
@section('content')


<!doctype html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="ThemeMakker">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <title>:: BigBucket :: Table Basic</title>

    <link rel="stylesheet" href="data/assets/vendor/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="data/assets/vendor/fontawesome/css/font-awesome.min.css">

    <link rel="stylesheet" href="data/assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css">

    <link  rel="stylesheet" href="data/assets/css/main.css">
</head>
<body class="theme-indigo">


        <div class="page">
            
            <div class="container-fluid">            
                <div class="row clearfix">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="header">
                                <h2><strong>Data</strong> Pengajuan </h2>
                            </div>
                            <div class="body">
                                <div class="table-responsive">
                                    <a href="{{url('pengajuan/add')}}"><button class="btn btn-primary ">Tambah Data</button></a>
                                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                        <thead>
                                            <tr>
                                              <th>No</th>
                                              <th>Nis</th>
                                              <th>Nama Lengkap</th>
                                              <th>Tempat Lahir</th>
                                              <th>Tanggal Lahir</th>
                                              <th>Jenis Kelamin</th>
                                              <th>Tinggi Badan</th>
                                              <th>Berat Badan</th>
                                              <th>Alamat </th>
                                              <th>Email</th>
                                              <th>No Telephone</th>
                                              <th>Persyaratan</th>
                                              <th>Lowongan</th>
                                              <th>Tanggal Pengajuan</th>
                                              <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        
                                        @foreach ($pengajuans as $key => $item)
                                        <tbody>
                                          <tr>
                                            <th>{{$key+1}}</th>
                                            <td>{{$item -> nis}}</td>
                                            <td>{{$item -> nama_lengkap}}</td>
                                            <td>{{$item -> tempat_lahir}}</td>
                                            <td>{{$item -> tanggal_lahir}}</td>
                                            <td>{{$item -> jenis_kelamin}}</td>
                                            <td>{{$item -> tb}}</td>
                                            <td>{{$item -> bb}}</td>
                                            <td>{{$item -> alamat}}</td>
                                            <td>{{$item -> email}}</td>
                                            <td>{{$item -> no_tlp}}</td>
                                            <td><a href="{{ asset('storage/'.$item->file_persyaratan.'{item}') }}" target="_blank"><button class="btn btn-success">Download</button></td>
                                            <td>{{$item -> lowongan}}</td>
                                            <td>{{$item-> tgl_pengajuan}}</td>
                                            <td> 
                                                <a href="pengajuan/delete/{{$item -> id}}" class="fas fa-trash-alt"></a>
                                                <a href="pengajuan/edit/{{$item -> id}}"class="fas fa-edit"></a>
                                          </tr>
                                        </tbody>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>


<!-- Jquery Core Js --> 
<script src="/data/assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js --> 
<script src="/data/assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js --> 

<!-- Jquery DataTable Plugin Js --> 
<script src="/data/assets/bundles/datatablescripts.bundle.js"></script>
<script src="/data/assets/vendor/jquery-datatable/buttons/dataTables.buttons.min.js"></script>
<script src="/data/assets/vendor/jquery-datatable/buttons/buttons.bootstrap4.min.js"></script>
<script src="/data/assets/vendor/jquery-datatable/buttons/buttons.colVis.min.js"></script>
<script src="/data/assets/vendor/jquery-datatable/buttons/buttons.flash.min.js"></script>
<script src="/data/assets/vendor/jquery-datatable/buttons/buttons.html5.min.js"></script>
<script src="/data/assets/vendor/jquery-datatable/buttons/buttons.print.min.js"></script>

<script src="/data/assets/js/theme.js"></script><!-- Custom Js --> 
<script src="/data/assets/js/pages/tables/jquery-datatable.js"></script>
</body>

</html>

@endsection
