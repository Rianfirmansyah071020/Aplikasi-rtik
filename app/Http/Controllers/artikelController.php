<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Kategori;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class artikelController extends Controller
{

    public function index() {

        Carbon::now();
        $user = Auth::user();
        $artikel = Artikel::paginate(9);

        return view('dashboard.anggota.artikel.index', [
            'title' => 'RTIK | Artikel',
            'sub_title' => 'Dashboard/Artikel',
            'user' => $user,
            'artikel' => $artikel,
            'waktu' => Carbon::now()
        ]);
    }


    public function artikel() {
        $user = Auth::user();
        $kategori = Kategori::all();
        return view('dashboard.anggota.artikel.artikel',[
            'title' => 'RTIK | Artikel',
            'sub_title' => 'Dashboard/Artikel/Create',
            'user' => $user,
            'kategori' => $kategori
        ]);
    }


    public function create(Request $request) {

        $validasi = $request->validate([
            'anggota_id' => 'required',
            'kategori_id' => 'required',
            'judul' => 'required',
            'isi' => 'required',
            'gambar' => 'required|image|mimes:png,jpg,jpeg,oip'
        ]);

        $ringkasan = Str::limit($request->isi, 20, '.....');

        $gambar = $request->file('gambar');
        $gambar->storeAs('public/artikel/', $gambar->hashName());

        $artikel = Artikel::create([
            'anggota_id' => $request->anggota_id,
            'kategori_id' => $request->kategori_id,
            'judul' => $request->judul,
            'ringkasan' => $ringkasan,
            'isi' => $request->isi,
            'gambar' => $gambar->hashName()
        ]);

        if($artikel) {
            return redirect('/dashboard/anggota/artikel/create')->with('success', 'Artikel berhasil ditambahkan');
        }else {
            return redirect('/dashboard/anggota/artikel/create')->with('success', 'Artikel gagal ditambahkan');
        }

    }


    public function show($id) {

        $artikel = Artikel::find($id);
        $user = Auth::user();

        return view('dashboard.anggota.artikel.showArtikel',[
            'title' => 'RTIK | Artikel',
            'sub_title' => 'Dashboard/Artikel/Show',
            'artikel' => $artikel,
            'user' => $user
        ]);
    }


    public function delete($id) {

        $artikel = Artikel::find($id);

        $artikel = $artikel->delete();

        if($artikel) {
            return redirect('/dashboard/anggota/artikel')->with('success', 'Delete data berhasil');
        }else {
            return redirect('/dashboard/anggota/artikel')->with('success', 'Delete data gagal');
        }
    }


    public function update($id){

        $artikel = Artikel::find($id);
        $user = Auth::user();
        $kategori = Kategori::all();

        return view('dashboard.anggota.artikel.update', [
            'title' => 'RTIK | Artikel',
            'sub_title' => 'Dashboard/Artikel/Update',
            'user' => $user,
            'artikel' => $artikel,
            'kategori' => $kategori
        ]);

    }


    public function update_aksi(Request $request, $id) {

        $artikel = Artikel::find($id);

        $validasi = $request->validate([
            'kategori_id' => 'required',
            'judul' => 'required',
            'isi' => 'required'
        ]);

        $ringkasan = Str::limit($request->isi, 100, '.....');

        if($request->gambar) {
            Storage::delete('public/artikel/'. $request->gambarLama);
            $gambar = $request->file('gambar');
            $gambar->storeAs('public/artikel/', $gambar->hashName());

            $artikel = $artikel->update([
                'kategori_id' => $request->kategori_id,
                'judul' => $request->judul,
                'ringkasan' => $ringkasan,
                'isi' => $request->isi,
                'gambar' => $gambar->hashName()
            ]);

        }else {

            $artikel = $artikel->update([
                'kategori_id' => $request->kategori_id,
                'judul' => $request->judul,
                'ringkasan' => $ringkasan,
                'isi' => $request->isi,
            ]);
        }

        if($artikel) {
            return redirect('/dashboard/anggota/artikel')->with('success', 'Update data berhasil');
        }else {
            return redirect('/dashboard/anggota/artikel')->with('success', 'Update data gagal');
        }
    }
}
