<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Postingan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostinganController extends Controller
{
    //

    function show(){
        $data['postingans'] = Postingan::all();
        return view('data_posting',$data);
    }
    function view(){
        $data['postingans'] = Postingan::all();
        return view('data_posting_alumni',$data);
    }

    function add(){
        $data=[
            'action'=>url('posting/create'),
            // 'tombol'=>'simpan',
            'perusahaans'=>(object)[
                'nama_perusahaan'=>'',
                'bidang_usaha'=>'',
                'alamat'=>'',
                'deskripsi'=>'',
                'email'=>'',
                'kontak'=>'',
                'foto_postingan'=>'',
            ],
        ];
        return view('form_posting',$data);
    }

    function create(Request $req){

        Postingan::create([
            'nama_perusahaan'=> $req->nama_perusahaan,
            'bidang_usaha'=> $req->bidang_usaha,
            'alamat'=> $req->alamat,
            'deskripsi'=> $req->deskripsi,
            'email'=> $req->email,
            'kontak'=> $req->kontak,
            'foto_postingan' => $req->file('foto_postingan')->store('foto_postingan'),
        ]);
        return redirect('data_postingan');
    }

    function hapus($item){
        $postingan = Postingan::where('id', $item)->first();
        $postingan->delete();
        Storage::delete($postingan->foto_postingan);
        return redirect('data_postingan');
    }

    function edit($item){
        $data['postingans']=Postingan::find($item);
        $data['status'] = ['Draft','Accepted','Rejected'];
        $data['action']= url('posting/update').'/'.$data['postingans']->id;

        return view('form_edit_posting',$data);
    }

    function update(Request $req){
        // Temukan postingan berdasarkan ID
        $postingan = Postingan::find($req->id);
    
        // Periksa apakah postingan ditemukan
        if (!$postingan) {
            // Jika tidak ditemukan, kembalikan atau tangani secara sesuai
            return redirect('data_postingan')->with('error', 'Postingan tidak ditemukan');
        }
    
        // Data untuk diupdate
        $data = [
            'nama_perusahaan'=> $req->nama_perusahaan,
            'bidang_usaha'=> $req->bidang_usaha,
            'alamat'=> $req->alamat,
            'deskripsi'=> $req->deskripsi,
            'email'=> $req->email,
            'kontak'=> $req->kontak,
            'status'=> $req->status,
        ];
    
        // Jika ada file yang diunggah
        if ($req->file('foto_postingan')) {
            // Hapus file lama
            Storage::delete($postingan->foto_postingan);
            // Simpan file yang baru diunggah
            $data['foto_postingan'] = $req->file('foto_postingan')->store('foto_postingan');
        } else {
            // Tetapkan jalur file yang sudah ada
            $data['foto_postingan'] = $postingan->foto_postingan;
        }
    
        // Update data postingan
        $postingan->update($data);
    
        // Redirect ke halaman data_postingan
        return redirect('data_postingan');
    }
    
    

}
