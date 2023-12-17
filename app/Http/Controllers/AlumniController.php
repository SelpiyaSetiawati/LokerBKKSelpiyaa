<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;


class AlumniController extends Controller
{
    //
    function register(){
        return view('registeralumnni');
    }

    function show(){
        $data['users'] = User::all();
        return view('data_alumni',$data);
    }
    

    function create(Request $request){
       $validate = $this->validate($request,[
        'nis' => '',
        'name' => '',
        'email' => '',
        'password' => '',
        'tahun_lulus' => '',
       ]);
       $validate['password'] = bcrypt($request->password);
       
        
        User::create($validate);


       return redirect('loginalumni');
    }

    function edit($item){
        $data['users']=User::find($item);
        $data['status'] = ['Draft','Accepted','Rejected'];
        $data['action']= url('alumni/update').'/'.$data['users']->id;

        return view('form_edit_alumni',$data);
    }

    function update(Request $req){
        // Temukan postingan berdasarkan ID
        $users = User::find($req->id);
    
        // Periksa apakah postingan ditemukan
        if (!$users) {
            // Jika tidak ditemukan, kembalikan atau tangani secara sesuai
            return redirect('data_alumni')->with('error', 'Postingan tidak ditemukan');
        }
    
        // Data untuk diupdate
        $data = [
            'nis' => $req-> nis,
        'name' => $req-> nama,
        'email' => $req-> email,
        'tahun_lulus' => $req-> tahun_lulus,
        'status' =>$req-> status,
        ];
    

        // Update data postingan
        $postingan->update($data);
    
        // Redirect ke halaman data_postingan
        return redirect('data_alumni');
    }
    
}