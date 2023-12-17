<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Pengajuan;
use App\Models\Perusahaan;
use App\Models\Postingan;
use App\Models\User;

class BerandaController extends Controller
{
    //
    function show(){
        $data['perusahaans'] = Perusahaan::all();
        $data['postingans'] = DB::select(" SELECT postingans.id, postingans.nama_perusahaan, postingans.deskripsi, postingans.created_at, postingans.bidang_usaha, postingans.foto_postingan, postingans.created_at FROM postingans  ORDER BY postingans.created_at DESC");
        return view('landingpage', $data);
    }

    function view(){
                $totalalumni = User::count();
                $totalperusahaan = Perusahaan::count();
                $totalpostingan = Postingan::count();
                $totalpengajuan = Pengajuan::count();
                $data['users'] = $totalalumni;
                $data['perusahaans'] = $totalperusahaan;
                $data['postingans'] = $totalpostingan;
                $data['pengajuans'] = $totalpengajuan;
        return view('dashboard',$data);
    }


}




namespace App\Http\Controllers;

use Illuminate\Http\Request;
use illuminate\Facades\Database;
use Illuminate\Support\Facades\DB;
use App\Models\Anggota;
use App\Models\Beritagudep;
use App\Models\Logo;
use Toastr;

class AnggotaController extends Controller
{
    //
    function show(){
        $gudep = auth('admin')->user()->no_gudep;
        $data['anggotas'] = Anggota::where('no_gudep',$gudep)->get();
        $data['foto'] =  Logo:: all();
        return view('dataanggota', $data);
    }
    function view(){
                // $anggotas= Anggota::groupBy('nis_nim')->count();
                $totalAnggota = Anggota::count();
                $totalBeritaGudep = Beritagudep::count();
                $data['anggotas'] = $totalAnggota;
                $data['beritagudeps'] = $totalBeritaGudep;
        return view('berandaadmin', $data);
    }

    function add(){
        $data=[
            'action'=>url('dataanggota/create'),
            'tombol'=>'simpan',
            'anggotas'=>(object)[
                'nis_nim'=>'',
                'no_kta'=>'',
                'nama_anggota'=>'',
                'jenis_kelamin'=>'',
                'password'=>'',
            ],
        ];
        return view('formdataanggota',$data);
    }
    function create(Request $req){
        $gudep = auth('admin')->user()->no_gudep;
        Anggota::create([
            'nis_nim' => $req->nis_nim,
            'no_kta' => $req->no_kta,
            'nama_anggota' => $req->nama_anggota,
            'jenis_kelamin' => $req->jenis_kelamin,
            'password' => bcrypt ($req->password),
            'no_gudep' => $gudep,
        ]);
        Toastr::success('Anggota berhasil ditambahkan', 'Berhasil');
        return redirect('dataanggota');
    }

    function hapus($item){
        Anggota::where('id',$item)->delete();
        return redirect('dataanggota');
    }

    function edit($item){
        $data['anggotas']=Anggota::find($item);
        $data['action']= url('dataanggota/update').'/'.$data['anggotas']->id;
        // $data['tombol']='update';
        return view('formdataanggota',$data);
    }

    function update(Request $req){
        // $this->validate($req ,[
        //     'id' => 'required|numeric',
        //     'judul' => 'required|string|max:50',
        //     'foto' => 'mimes:jpg,png'
        // ]);
        Anggota::where('id',$req->id)->update([
            'nis_nim'=>$req->nis_nim,
            'no_kta'=>$req->no_kta,
            'nama_anggota'=>$req->nama_anggota,
            'jenis_kelamin'=>$req->jenis_kelamin,
            'password'=> bcrypt ($req->password),
        ]);
        Toastr::success('Anggota berhasil diedit', 'Berhasil');
        return redirect('dataanggota');
    }
    
}

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Sambutan;
use App\Models\AgendaKegiatan;
use App\Models\Beritagudep;
use App\Models\Materi;
use App\Models\Galeri;
use App\Models\KontakAdmin;
use App\Models\Slider;
use App\Models\StrukturGudep;
use App\Models\Visimisi;
use App\Models\Pembina;
use App\Models\Pesan;
use App\Models\Logo;
use App\Models\BiodataAnggota;
use Illuminate\Support\Facades\DB;



class HomeController extends Controller
{
    //
    function beranda($slugSekolah){
        $data['sekolah'] = Admin::where('slug', $slugSekolah)->firstOrFail();
        $gudep = $data['sekolah']->no_gudep;
        // dd($gudep);
        $data['kontak_admins'] = KontakAdmin::where('no_gudep',$gudep)->get();
        $data['sambutans'] = Sambutan::where('no_gudep',$gudep)->first();
        // $data['agendakegiatan'] = DB::select(' SELECT agendakegiatan.id, agendakegiatan.judul, agendakegiatan.foto, agendakegiatan.foto_thubnail, agendakegiatan.deskripsi, agendakegiatan.tanggal FROM agendakegiatan ORDER BY agendakegiatan.tanggal DESC LIMIT 3');
        $data['beritagudeps'] = DB::select(" SELECT beritagudeps.id, beritagudeps.judul_gudep, beritagudeps.isi_gudep, beritagudeps.foto_gudep, beritagudeps.tanggal_gudep, beritagudeps.slug FROM beritagudeps WHERE beritagudeps.no_gudep='$gudep' ORDER BY beritagudeps.tanggal_gudep DESC LIMIT 3");
        // $data['beritagudeps'] = Beritagudep::where('no_gudep',$gudep)->orderBy('tanggal_gudep','desc')->limit(3)->get();

        $data['data_galeri'] = DB::select(" SELECT galeri.id, galeri.judul, galeri.status, galeri.foto, galeri.keterangan, galeri.tanggal FROM galeri WHERE galeri.no_gudep='$gudep' AND galeri.status='foto'  ORDER BY galeri.tanggal DESC LIMIT 3");
        $data['materis'] =  DB::select(" SELECT materis.id_materi, materis.judul_materi, materis.file_materi, materis.foto_materi FROM materis WHERE materis.no_gudep='$gudep'  ORDER BY created_at DESC LIMIT 3");
        $data['agendakegiatan'] = AgendaKegiatan::where('no_gudep',$gudep)->orderBy('tanggal','desc')->limit(3)->get();
        $data['foto_slider'] = Slider::where('no_gudep',$gudep)->first();
        $data['strukturgudep']=StrukturGudep::where('no_gudep',$gudep)->first();
        $data['logo'] = Logo::where('no_gudep',$gudep)->first();

        return view ('berandagudep',$data);
    }

    function profil($slugSekolah){
        $data['sekolah'] = Admin::where('slug', $slugSekolah)->firstOrFail();
        $gudep = $data['sekolah']->no_gudep;
        $data['sambutans']= Sambutan::where('no_gudep',$gudep)->get();
        $data['visimisis']= Visimisi::where('no_gudep',$gudep)->get();
        $data['strukturgudep']= StrukturGudep::where('no_gudep',$gudep)->get();
        $data['kontak_admins']= KontakAdmin::where('no_gudep',$gudep)->get();
        $data['pembina']= Pembina::where('no_gudep',$gudep)->get();
        $data['logo'] = Logo::where('no_gudep',$gudep)->first();

        return view('profilgudep',$data);
    }

    function agendakegiatan($slugSekolah){
        $data['sekolah'] = Admin::where('slug', $slugSekolah)->firstOrFail();
        $gudep = $data['sekolah']->no_gudep;
        $data['kontak_admins'] = KontakAdmin::where('no_gudep',$gudep)->get();
        $data['agendakegiatan'] = AgendaKegiatan::where('no_gudep',$gudep)->get();
        $data['logo'] = Logo::where('no_gudep',$gudep)->first();

        return view('agendagudep',$data);
    }
    function detailagenda($slugSekolah,$slug){
        $data['sekolah'] = Admin::where('slug', $slugSekolah)->firstOrFail();
        $gudep = $data['sekolah']->no_gudep;
        $data['kontak_admins'] = KontakAdmin::where('no_gudep',$gudep)->get();
        $data['agendakegiatan'] = AgendaKegiatan ::where('slug',$slug)->where('no_gudep',$gudep)->first();
        $data['logo'] = Logo::where('no_gudep',$gudep)->first();

        return view('detailagendagudep',$data);
    }

    function berita($slugSekolah){
        $data['sekolah'] = Admin::where('slug', $slugSekolah)->firstOrFail();
        $gudep = $data['sekolah']->no_gudep;
        $data['beritagudeps'] = Beritagudep :: where('no_gudep',$gudep)->get();
        $data['kontak_admins'] = KontakAdmin::where('no_gudep',$gudep)->get();
        $data['logo'] = Logo::where('no_gudep',$gudep)->first();

        return view ('beritaweb', $data);
    }

    function detailberita($slugSekolah,$slug){
        $data['sekolah'] = Admin::where('slug', $slugSekolah)->firstOrFail();
        $gudep = $data['sekolah']->no_gudep;
        $data['beritagudeps'] = Beritagudep ::where('slug',$slug)->where('no_gudep',$gudep)->first();
        // $data['beritagudeps'] = Beritagudep::get();
        // $data['action'] = '';
        $data['kontak_admins'] = KontakAdmin::where('no_gudep',$gudep)->get();
        $data['logo'] = Logo::where('no_gudep',$gudep)->first();
        return view ('detailweb', $data);
    }

    function foto($slugSekolah){
        $data['sekolah'] = Admin::where('slug', $slugSekolah)->firstOrFail();
        $gudep = $data['sekolah']->no_gudep;
            $data['data_galeri'] = DB::select(" SELECT galeri.id, galeri.judul, galeri.status, galeri.foto, galeri.keterangan, galeri.tanggal FROM galeri WHERE  galeri.no_gudep='$gudep' AND galeri.status='foto' ORDER BY galeri.tanggal DESC ");
            $data['kontak_admins'] = KontakAdmin::where('no_gudep',$gudep)->get();
        $data['logo'] = Logo::where('no_gudep',$gudep)->first();

        
        return view ('fotoweb', $data);
    }

    function video($slugSekolah){
        $data['sekolah'] = Admin::where('slug', $slugSekolah)->firstOrFail();
        $gudep = $data['sekolah']->no_gudep;
        $data['data_video'] = DB::select(" SELECT galeri.id, galeri.judul, galeri.status, galeri.video, galeri.keterangan, galeri.tanggal FROM galeri WHERE galeri.no_gudep='$gudep' AND galeri.status='video'  ORDER BY galeri.tanggal DESC");
        $data['kontak_admins'] = KontakAdmin::where('no_gudep',$gudep)->get();
        $data['logo'] = Logo::where('no_gudep',$gudep)->first();

        
        return view ('videoweb', $data);
    }

    function materi($slugSekolah){
        $data['sekolah'] = Admin::where('slug', $slugSekolah)->firstOrFail();
        $gudep = $data['sekolah']->no_gudep;
            $data['kontak_admins'] = KontakAdmin::where('no_gudep',$gudep)->get();
            $data['materis'] = Materi::where('no_gudep',$gudep)->get();
        $data['logo'] = Logo::where('no_gudep',$gudep)->first();

        
        return view ('direktorigudep', $data);
    }
    function kontak($slugSekolah){
        $data['sekolah'] = Admin::where('slug', $slugSekolah)->firstOrFail();
        $gudep = $data['sekolah']->no_gudep;
            $data['kontak_admins'] = KontakAdmin::where('no_gudep',$gudep)->get();
            $data['pesan_admins'] = Pesan::where('no_gudep',$gudep)->get();
        $data['logo'] = Logo::where('no_gudep',$gudep)->first();

        
        return view ('kontakgudep', $data);
    }
//     function dashboard($slugSekolah){
//         $data['sekolah'] = Admin::where('slug', $slugSekolah)->firstOrFail();
//         return view('bar',$data);
//     }

function berandaanggota($slugSekolah){
    $data['sekolah'] = Admin::where('slug', $slugSekolah)->firstOrFail();
    $gudep = $data['sekolah']->no_gudep;
        $data['biodataanggota'] = BiodataAnggota::where('no_gudep',$gudep)->get();
    $data['logo'] = Logo::where('no_gudep',$gudep)->first();

    
    return view ('biodataanggota', $data);
}
}
