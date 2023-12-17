<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perusahaan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class PerusahaanController extends Controller
{
    //
    function show(){
        $data['perusahaans'] = Perusahaan::all();
        return view('data_perusahaan', $data);
    }

    function add(){
        $data=[
            'action'=>url('perusahaan/create'),
            // 'tombol'=>'simpan',
            'perusahaans'=>(object)[
                'id'=>'',
                'deskripsi'=>'',
                'foto_perusahaan'=>'',
                'nama_perusahaan'=>'',
            ],
        ];
        return view('form_data_perusahaan',$data);
    }

    function create(Request $req){

        Perusahaan::create([
            'id' => $req->id,
            'foto_perusahaan' => $req->file('foto_perusahaan')->store('foto_perusahaan'),
            'deskripsi'=> $req->deskripsi,
            'nama_perusahaan'=> $req->nama_perusahaan,
        ]);
        return redirect('data_perusahaan');
    }

    function hapus($item){
        $perusahaan = Perusahaan::where('id', $item)->first();
        $perusahaan->delete();
        Storage::delete($perusahaan->foto_perusahaan);
        return redirect('data_perusahaan');
    }

    function edit($item){
        $data['perusahaans']=Perusahaan::find($item);
        $data['action']= url('perusahaan/update').'/'.$data['perusahaans']->id;
        // $data['tombol']='update';
        return view('form_data_perusahaan',$data);
    }

    function update(Request $req){

        if($req->file('foto_perusahaan')){
            $perusahaan = Perusahaan::where('id',$req->id)->first();
            // Storage::delete($perusahaan->foto_perusahaan);
            $file = $req->file('foto_perusahaan')->store('foto_perusahaan');
        }else{
            $file = DB::raw('foto_perusahaan');
        }
        Perusahaan::where('id',$req->id)->update([
            'id' => $req->id,
            'foto_perusahaan' => $req->file('foto_perusahaan')->store('foto_perusahaan'),
            'deskripsi'=> $req->deskripsi,
            'nama_perusahaan'=> $req->nama_perusahaan,
        ]);
        return redirect('data_perusahaan');
    }
}
