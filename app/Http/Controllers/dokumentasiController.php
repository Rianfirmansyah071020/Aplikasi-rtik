<?php

namespace App\Http\Controllers;

use App\Models\Dokumentasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class dokumentasiController extends Controller
{

    public function index() {

        $dokumentasi = DB::table('dokumentasis')->paginate(15);

        return view('dashboard.anggota.dokumentasi.index', [
            'title' => 'RTIK | Dokumentasi',
            'sub_title' => 'Dashboard/Dokumentasi',
            'dokumentasi' => $dokumentasi,
            'user' => Auth::user()
        ]);
    }

    public function create(Request $request) {

        $validasi = $request->validate([
            'gambar' => 'required|image|mimes:png,jpg,oip,jpeg,gif'
        ]);

        $gambar = $request->file('gambar');
        $gambar->storeAs('public/dokumentasi/', $gambar->hashName());

        $dokumentasi =  Dokumentasi::create([
            'file' => $gambar->hashName()
        ]);


        if($dokumentasi) {
            return redirect('/dashboard/anggota/dokumentasi')->with('success', 'Dokumentasi berhasil ditambahkan');
        }else {
            return redirect('/dashboard/anggota/dokumentasi')->with('success', 'Dokumentasi gagal ditambahkan');
        }
    }


    public function delete($id) {

        $dokumentasi = DB::table('dokumentasis')->find($id);
        Storage::delete('public/dokumentasi/'. $dokumentasi->file);

        $dokumentasi = Dokumentasi::find($id)->delete();

        if($dokumentasi) {
            return redirect('/dashboard/anggota/dokumentasi')->with('success', 'Dokumentasi berhasil dihapus');
        }else {
            return redirect('/dashboard/anggota/dokumentasi')->with('success', 'Dokumentasi gagal dihapus');
        }
    }
}
