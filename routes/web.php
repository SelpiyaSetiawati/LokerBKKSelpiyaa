<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\PostinganController;
use App\Http\Controllers\BerandaController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::get('/bar_alumni', function () {
    return view('bar_alumni');
});


Route::get('/template', function () {
    return view('template');
});

Route::get('/alumni', function () {
    return view('dash');
});
Route::get('/loginadmin', function () {
    return view('loginadmin');
});

Route::get('/loginalumni', function () {
    return view('loginalumni');
});

Route::post('auth',[AuthController::class,'login']);
Route::get('logout',[AuthController::class,'logout']);
// routes/web.php

Route::middleware(['auth:admin'])->group(function () {
    
});

Route::get('dashboard',[AuthController::class,'show']);
Route::get('dashboard',[BerandaController::class,'view']);


Route::post('alumni/auth',[AuthController::class,'alumni']);
Route::get('alumni/logout',[AuthController::class,'logot']);

Route::middleware(['auth:web'])->group(function () {

});

Route::get('landingpage',[BerandaController::class,'show']);

Route::get('dashboardalumni',[AuthController::class,'view']);
Route::get('data_alumni',[AlumniController::class,'show']);
Route::get('register',[AlumniController::class,'register']);
Route::post('register/create',[AlumniController::class,'create']);
Route::get('perusahaan',[AlumniController::class,'view']);
Route::get('/alumni/edit/{item}',[AlumniController::class,'edit']);
Route::get('/alumni/update/{item}',[AlumniController::class,'update']);

Route::get('data_perusahaan',[PerusahaanController::class,'show']);
Route::get('/perusahaan/add',[PerusahaanController::class,'add']);
Route::post('/perusahaan/create',[PerusahaanController::class,'create']);
Route::get('/perusahaan/delete/{item}',[PerusahaanController::class,'hapus']);
Route::get('/perusahaan/edit/{item}',[PerusahaanController::class,'edit']);
Route::post('/perusahaan/update/{item}',[PerusahaanController::class,'update']);


Route::get('data_pengajuan',[PengajuanController::class,'show']);
Route::get('data_pengajuan_alumni',[PengajuanController::class,'view']);
Route::get('/pengajuan/add',[PengajuanController::class,'add']);
Route::get('/formpengajuan',[PengajuanController::class,'tambah']);
Route::post('/pengajuan/tambah',[PengajuanController::class,'tmbh']);
Route::post('/pengajuan/create',[PengajuanController::class,'create']);
Route::get('/pengajuan/delete/{item}',[PengajuanController::class,'hapus']);
Route::post('/pengajuan/update/{item}',[PengajuanController::class,'update']);

Route::get('data_postingan',[PostinganController::class,'show']);
Route::get('data_postingan_alumni',[PostinganController::class,'view']);
Route::get('form_posting',[PostinganController::class,'add']);
Route::post('posting/create',[PostinganController::class,'create']);
Route::get('/posting/delete/{item}',[PostinganController::class,'hapus']);
Route::get('/posting/edit/{item}',[PostinganController::class,'edit']);
Route::post('/posting/update/{item}',[PostinganController::class,'update']);