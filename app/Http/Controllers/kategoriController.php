<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Support\Facades\Auth;

class kategoriController extends Controller
{

    public function index() {

        $data = Kategori::all();
        $user = Auth::user();

        return view('dashboard.anggota.kategori.index',[
            'title' => 'RTIK | Kategori',
            'sub_title' => 'Dashboard/Kategori',
            'data' => $data,
            'user' => $user
        ]);
    }

    public function create(Request $request) {

        $validasi = $request->validate([
            'kategori' => 'unique:kategoris,kategori|required'
        ]);

        $kategori = Kategori::create([
            'kategori' => $request->kategori
        ]);

        if($kategori) {
            return redirect('/dashboard/anggota/kategori')->with('success', 'Data berhasil disimpan');
        }else {
            return redirect('/dashboard/anggota/kategori')->with('success', 'Data gagal disimpan');
        }

    }


    public function delete(Request $request) {

        // $divisi = DB::table('divisis')->where('id', $request->id)->delete();

        $kategori = Kategori::find($request->id)->delete();

        if($kategori) {
            return redirect('/dashboard/anggota/kategori')->with('success', 'Data berhasil di hapus');
        }else {
            return redirect('/dashboard/anggota/kategori')->with('success', 'Data gagal di hapus');
        }

    }

    public function update(Request $request) {
        $kategori = Kategori::find($request->id);
        $data = Kategori::all();
        $user = Auth::user();

        return view('dashboard.anggota.kategori.index', [
            'title' => 'RTIK | Kategori',
            'sub_title' => 'Dashboard/Kategori/Update',
            'data' => $data,
            'kategori' => $kategori,
            'user' => $user
        ]);
    }

    public function update_aksi(Request $request, $id) {

        $validasi = $request->validate([
            'kategori' => 'unique:kategoris,kategori'
        ]);

        $kategori = Kategori::find($id)->update([
            'kategori' => $request->kategori
        ]);

        if($kategori){
            return redirect('/dashboard/anggota/kategori')->with('success', 'Update data berhasil');
        }else {
            return redirect('/dashboard/anggota/kategori')->with('success', 'Update data gagal');
        }
    }
}
