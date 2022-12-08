<?php

namespace App\Http\Controllers;

use App\Models\Agama;
use App\Models\Divisi;
use App\Models\Status;
use App\Models\Anggota;
use App\Models\Artikel;
use App\Models\Kontent;
use App\Models\Kategori;
use App\Models\Pendaftar;
use App\Models\Dokumentasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use NunoMaduro\Collision\Adapters\Phpunit\State;

class umumController extends Controller
{
    public function home() {

        return view('umum.home', [
            'title' => 'RTIK | Home',
            'status' => Status::all(),
            'kategori' => Kategori::all(),
            'konten' => Kontent::all(),
            'dokumentasi' => Dokumentasi::all(),            
        ]);
    }


    public function anggota($id){
        $namaStatus = DB::table('statuses')->where('id', $id)->value('status');

        return view('umum.anggota', [
            'title' => 'RTIK | Anggota',
            'status' => Status::all(),
            'kategori' => Kategori::all(),
            'anggota' => Anggota::all()->where('status_id', $id),
            'namaStatus' => $namaStatus

        ]);
    }


    public function artikel($id) {
        $namaKategori = DB::table('kategoris')->where('id', $id)->value('kategori');

        return view('umum.artikel', [
            'title' => 'RTIK | Artikel',
            'status' => Status::all(),
            'kategori' => Kategori::all(),
            'artikel' => Artikel::all()->where('kategori_id', $id),
            'namaKategori' => $namaKategori,
        ]);
    }


    public function view_artikel($id) {
        $idA = $id - 1;
        return view('umum.view', [
            'title' => 'RTIK | Artikel',
            'status' => Status::all(),
            'kategori' => Kategori::all(),
            'artikel' => Artikel::all()->where('id', $id),
            'id' => $idA
        ]);
    }

    public function daftar() {

        return view('umum.daftar', [
            'title' => 'RTIK | Daftar',
            'status' => Status::all(),
            'kategori' => Kategori::all(),
            'agama' => Agama::all(),
            'divisi' => Divisi::all()
        ]);
    }


    public function daftar_aksi(Request $request) {

        $validasi = $request->validate([
            'divisi_id' => 'required',
            'agama_id' => 'required',
            'nohp' => 'required',
            'nim' => 'required',
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tgl_th_lahir' => 'required',
            'jekel' => 'required',
            'alamat' => 'required',
            'tujuan' => 'required',
            'tahun_masuk' => 'required',
            'gambar' => 'required|mimes:jpg,jpeg,png,oip'
        ]);

        $gambar = $request->file('gambar');
        $gambar->storeAs('public/pendaftar/', $gambar->hashName());

        $daftar = Pendaftar::create([
            'divisi_id' => $request->divisi_id,
            'agama_id' => $request->agama_id,
            'nohp' => $request->nohp,
            'nim' => $request->nim,
            'nama' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_th_lahir' => $request->tgl_th_lahir,
            'jekel' => $request->jekel,
            'alamat' => $request->alamat,
            'tujuan' => $request->tujuan,
            'tahun_masuk' => $request->tahun_masuk,
            'gambar' => $gambar->hashName()
        ]);

        if($daftar) {
            return redirect('/info');
        }
    }


    public function info() {

        return view('umum.info', [
            'title' => 'RTIK | Info',
            'status' => Status::all(),
            'kategori' => Kategori::all()
        ]);
    }
}
