<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use App\Models\Anggota;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class akunController extends Controller
{

    public function index() {

        $data = User::all();
        $anggota = Anggota::all();
        $user = Auth::user();

        return view('dashboard.anggota.akun.index',[
            'title' => 'RTIK | Akun',
            'sub_title' => 'Dashboard/Akun',
            'data' => $data,
            'anggota' => $anggota,
            'user' => $user
        ]);
    }

    public function create(Request $request) {

        $validasi = $request->validate([
            'anggota_id' => 'required|max:10|unique:users,anggota_id',
            'email' => 'required|email|unique:users,email',
            'password' => 'required'
        ]);
        

        $user = User::create([
            'anggota_id' => $request->anggota_id,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'level' => 'anggota'
        ]);



        if($user) {
            return redirect('/dashboard/anggota/akun')->with('success', 'Data berhasil disimpan');
        }else {
            return redirect('/dashboard/anggota/akun')->with('success', 'Data gagal disimpan');
        }

    }


    public function delete($id) {

        $user = User::find($id)->delete();

        if($user) {
            return redirect('/dashboard/anggota/akun')->with('success', 'Data berhasil dihapus');
        }else {
            return redirect('/dashboard/anggota/akun')->with('success', 'Data gagal dihapus');
        }

    }

    public function update($id) {

        $data = User::all();
        $anggota = Anggota::all();
        $akun = User::find($id);
        $user = Auth::user();

        return view('dashboard.anggota.akun.index',[
            'title' => 'RTIK | Akun',
            'sub_title' => 'Dashboard/Anggota/Akun/Update',
            'data' => $data,
            'anggota' => $anggota,
            'akun' => $akun,
            'user' => $user
        ]);
    }


    public function update_aksi(Request $request, $id) {

        $akun = User::all();

        $validasi = $request->validate([
            'anggota_id' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if($request->password === $akun[0]->password) {
            $password = $request->password;
        }else {
            $password = Hash::make($request->password);
        }

        $user = User::find($id)->update([
            'anggota_id' => $request->anggota_id,
            'email' => $request->email,
            'password' => $password
        ]);

        if($user) {
            return redirect('/dashboard/anggota/akun')->with('success', 'Update data berhasil');
        }else {
            return redirect('/dashboard/anggota/akun')->with('success', 'Update data gagal');
        }
    }


    public function detail($id) {
        $data = User::find($id);
        $user = Auth::user();

        return view('dashboard.anggota.akun.detail', [
            'title' => 'RTIK | Akun',
            'sub_title' => 'Dashboard/Anggota/Akun/Detail',
            'data' => $data,
            'user' => $user
        ]);
    }
}
