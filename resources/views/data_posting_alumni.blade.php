@extends('bar_alumni')
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
                                <h2><strong>Data</strong> Posting </h2>
                            </div>
                            <div class="body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Foto</th>
                                                <th>Nama Perusahaan</th>
                                                <th>Bidang Usaha</th>
                                                <th>alamat</th>
                                                <th>Deskripsi</th>
                                                <th>Email</th>
                                                <th>Kontak</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            @foreach ($postingans as $key =>$item)
                                                
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td>
                                                    <img src="\storage\{{ $item->foto_postingan }}" alt="" width="100"></center>
                                                </td>
                                                <td>{{$item->nama_perusahaan}}</td>
                                                <td>{{$item->bidang_usaha}}</td>
                                                <td>{{$item->alamat}}</td>
                                                <td>{{$item->deskripsi}}</td>
                                                <td>{{$item->email}}</td>
                                                <td>{{$item->kontak}}</td>
                                                <td><a href="" class="text-white btn btn-sm
                                                     @if($item->status == 'Draft') btn-warning
                                                     @elseif($item->status == 'Accepted') btn-success
                                                     @elseif($item->status == 'Rejected') btn-warning
                                                     @endif">
                                                     {{$item->status}}
                                                    </a></td>
                                                <td>
                                                    
                                                    
                                                  </td>
                                            </tr>
                                            @endforeach
                                            
                                        </tbody>
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