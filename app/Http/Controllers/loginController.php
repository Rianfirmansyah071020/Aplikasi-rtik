<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use App\Models\User;
use App\Models\Status;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class loginController extends Controller
{
    public function index() {
        $user = User::all();
        return view('login.login', [
            'title' => 'RTIK | Login',
            'user' => $user,
            'status' => Status::all(),
            'kategori' => Kategori::all(),
        ]);
    }


    public function login(Request $request) {

        $validasi = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);        

        $level = DB::table('users')->where('email', $request->email)->value('level');


        if (Auth::attempt($validasi)) {
            $request->session()->regenerate();
                
            if($level === 'anggota') {
                return redirect('/dashboard/anggota');
            }else {
                return redirect('/dashboard/pendaftar');
            }


        }else {
                return redirect('/login');
        }


    }
}
