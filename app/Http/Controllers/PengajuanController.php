<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengajuan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class PengajuanController extends Controller
{
    //
    function show(){
        $data['pengajuans'] = Pengajuan::all();
        return view('data_pengajuan',$data);
        // return view('data_pengajuan');
    }
    function view(){
        $data['pengajuans'] = Pengajuan::all();
        return view('data_pengajuan_alumni',$data);
        // return view('data_pengajuan');
    }


    function add(){
        $data=[
            'action'=>url('/pengajuan/create'),
            // 'tombol'=>'simpan',
            'pengajuans'=>(object)[
                'nis'=>'',
                'nama_lengkap'=>'',
                'tempat_lahir'=>'',
                'tanggal_lahir'=>'',
                'jenis_kelamin'=>'',
                'tb'=>'',
                'bb'=>'',
                'alamat'=>'',
                'email'=>'',
                'no_tlp'=>'',
                'persyaratan'=>'',
                'lowongan'=>'',
                'tgl_pengajuan'=>'',
            ],
        ];
        return view('form_pengajuan',$data);
    }

    function create(Request $req){

        Pengajuan::create([
            'nis' => $req->nis,
            'nama_lengkap' => $req->nama_lengkap,
            'tempat_lahir' => $req->tempat_lahir,
            'tanggal_lahir' => $req->tanggal_lahir,
            'jenis_kelamin' => $req->jenis_kelamin,
            'tb' => $req->tb,
            'bb' => $req->bb,
            'alamat' => $req->alamat,
            'email' => $req->email,
            'no_tlp' => $req->no_tlp,
            'persyaratan' => $req->file('file_persyaratan')->store('file_persyaratan'),
            'lowongan' => $req->lowongan,
            'tgl_pengajuan' => $req->tgl_pengajuan,
        ]);
        return redirect('data_pengajuan');
    }

    function tambah(){
        $data=[
            'action'=>url('/pengajuan/tambah'),
            // 'tombol'=>'simpan',
            'pengajuans'=>(object)[
                'nis'=>'',
                'nama_lengkap'=>'',
                'tempat_lahir'=>'',
                'tanggal_lahir'=>'',
                'jenis_kelamin'=>'',
                'tb'=>'',
                'bb'=>'',
                'alamat'=>'',
                'email'=>'',
                'no_tlp'=>'',
                'persyaratan'=>'',
                'lowongan'=>'',
                'tgl_pengajuan'=>'',
            ],
        ];
        return view('formpengajuan',$data);
    }

    function tmbh(Request $req){

        Pengajuan::create([
            'nis' => $req->nis,
            'nama_lengkap' => $req->nama_lengkap,
            'tempat_lahir' => $req->tempat_lahir,
            'tanggal_lahir' => $req->tanggal_lahir,
            'jenis_kelamin' => $req->jenis_kelamin,
            'tb' => $req->tb,
            'bb' => $req->bb,
            'alamat' => $req->alamat,
            'email' => $req->email,
            'no_tlp' => $req->no_tlp,
            'persyaratan' => $req->file('file_persyaratan')->store('file_persyaratan'),
            'lowongan' => $req->lowongan,
            'tgl_pengajuan' => $req->tgl_pengajuan,
        ]);
        return redirect('landingpage');
    }

    function hapus($item){
        $pengajuans = Pengajuan::where('id', $item)->first();
        $pengajuans->delete();
        Storage::delete($pengajuans->file_persyaratan);
        return redirect('data_pengajuan');
    }

    function edit($item){
        $data['pengajuans']=Pengajuan::find($item);
        $data['action']= url('pengajuan/update').'/'.$data['pengajuans']->id;
        // $data['tombol']='update';
        return view('form_pengajuan',$data);
    }

    function update(Request $req){

        if($req->file('file_persyaratan')){
            $pengajuans = Pengajuan::where('id',$req->id)->first();
            Storage::delete($pengajuans->foto);

            $file = $req->file('fle_persyaratan')->store('foto_persyaratan');
        }else{
            $file = DB::raw('file_persyaratan');
        }
        Pengajuan::where('id',$req->id)->update([
            'nis' => $req->nis,
            'nama_lengkap' => $req->nama_lengkap,
            'tempat_lahir' => $req->tempat_lahir,
            'tanggal_lahir' => $req->nama_lengkap,
            'jenis_kelamin' => $req->jenis_kelamin,
            'tb' => $req->tb,
            'bb' => $req->bb,
            'alamat' => $req->alamat,
            'email' => $req->email,
            'no_tlp' => $req->no_tlp,
            'persyaratan' => $req->file('file_persyaratan')->store('file_persyaratan'),
            'lowongan' => $req->lowongan,
            'tgl_pengajuan' => $req->tgl_pengajuan,
        ]);
        return redirect('data_pengajuan');
    }
}
