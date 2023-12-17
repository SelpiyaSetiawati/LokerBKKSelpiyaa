<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
    
        if (Auth::guard('admin')->attempt($credentials)) {
            // Login berhasil
            return redirect()->intended('/dashboard');
        }
    
        // Login gagal
        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    function show(Request $req){

        return view('dashboard');
    }

    public function alumni(Request $request)
    {
        $credentials = $request->only('nis','email', 'password');
    
        if (Auth::guard('web')->attempt($credentials)) {
            // Login berhasil
            return redirect()->intended('/dashboardalumni');
        }
    
        // Login gagal
        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    function view(Request $req){

        return view('dashboardalumni');
    }

    function logout(){
        Auth::guard('admin')->logout();
        return redirect('/loginadmin');
    }

    function logot(){
        Auth::guard('web')->logout();
        return redirect('/loginalumni');
    }
}
