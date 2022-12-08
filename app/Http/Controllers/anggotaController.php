<?php

namespace App\Http\Controllers;

use App\Models\Agama;
use App\Models\Divisi;
use App\Models\Status;
use App\Models\Anggota;
use App\Models\Angkatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use PDF;



class anggotaController extends Controller
{
    public function index() {

        $data = Anggota::all();
        $user = Auth::user();

        return view('dashboard.anggota.anggota.index',[
            'title' => 'RTIK | Anggota',
            'sub_title' => 'Dashboard/Anggota',
            'data' => $data,
            'user' => $user
        ]);
    }


    public function create() {

        $divisi = Divisi::all();
        $status = Status::all();
        $agama = Agama::all();
        $angkatan = Angkatan::all();
        $user = Auth::user();

        return view('dashboard.anggota.anggota.create', [
            'title' => 'RTIK | Anggota',
            'sub_title' => 'Dashboard/Anggota/Create',
            'divisi' => $divisi,
            'status' => $status,
            'agama' => $agama,
            'angkatan' => $angkatan,
            'user' => $user
        ]);
    }


    public function create_aksi(Request $request) {

        $validasi = $request->validate([
            'divisi_id' => 'required',
            'status_id' => 'required',
            'agama_id' => 'required',
            'angkatan_id' => 'required',
            'nohp' => 'required',
            'nim' => 'required|unique:anggotas,nim|max:10|min:2',
            'nama' => 'required|max:60|min:2',
            'tempat_lahir' => 'required|max:100',
            'tgl_th_lahir' => 'required',
            'jekel' => 'required',
            'alamat' => 'required|max:100|min:5',
            'tahun_masuk' => 'required',
            'tahun_selesai' => 'max:10',
            'gambar' => 'required|image|mimes:jpg,jpeg,png,oip'
        ]);

        $gambar = $request->file('gambar');

        $gambar->storeAs('public/anggota/', $gambar->hashName());

        $anggota = Anggota::create([
            'divisi_id' => $request->divisi_id,
            'status_id' => $request->status_id,
            'agama_id' => $request->agama_id,
            'angkatan_id' => $request->angkatan_id,
            'nohp' => $request->nohp,
            'nim' => $request->nim,
            'nama' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_th_lahir' => $request->tgl_th_lahir,
            'jekel' => $request->jekel,
            'alamat' => $request->alamat,
            'tahun_masuk' => $request->tahun_masuk,
            'tahun_selesai' => $request->tahun_selesai,
            'gambar' => $gambar->hashName()
        ]);

        if($anggota) {
            return redirect('/dashboard/anggota/anggota/create')->with('success', 'Data berhasil disimpan');
        }else {
            return redirect('/dashboard/anggota/anggota/create')->with('success', 'Data gagal disimpan');
        }

    }


    public function detail ($id) {

        $anggota = Anggota::find($id);
        $user = Auth::user();

        return view('dashboard.anggota.anggota.detail',[
            'title' => 'RTIK | Anggota',
            'sub_title' => 'Dashboard/Anggota/Detail',
            'data' => $anggota,
            'user' => $user
        ]);

    }


    public function update(Request $request){

        $data = Anggota::find($request->id);
        $divisi = Divisi::all();
        $status = Status::all();
        $agama = Agama::all();
        $angkatan = Angkatan::all();
        $user = Auth::user();

        return view('dashboard.anggota.anggota.update',[
            'title' => 'RTIK | Anggota',
            'sub_title' => 'Dashboard/Anggota/Update',
            'divisi' => $divisi,
            'status' => $status,
            'agama' => $agama,
            'data' => $data,
            'angkatan' => $angkatan,
            'user' => $user
        ]);

    }


    public function update_aksi(Request $request){
        $id = $request->id;
        $anggota = Anggota::find($id);

        $validasi = $request->validate([
            'divisi_id' => 'required',
            'status_id' => 'required',
            'agama_id' => 'required',
            'angkatan_id' => 'required',
            'nohp' => 'required',
            'nim' => 'required|max:10|min:2',
            'nama' => 'required|max:60|min:2',
            'tempat_lahir' => 'required|max:100',
            'tgl_th_lahir' => 'required',
            'jekel' => 'required',
            'alamat' => 'required|max:100|min:5',
            'tahun_masuk' => 'required',
            'tahun_selesai' => 'max:10',
            'gambar' => 'image|mimes:jpg,jpeg,png,oip'
        ]);

        if($request->file('gambar')) {

            $gambar = $request->file('gambar');
            $gambar->storeAs('public/anggota/', $gambar->hashName());
            Storage::delete('public/anggota/'. $request->gambarLama);

            $anggota = $anggota->update([
                'divisi_id' => $request->divisi_id,
                'status_id' => $request->status_id,
                'angkatan_id' => $request->angkatan_id,
                'nohp' => $request->nohp,
                'nim' => $request->nim,
                'nama' => $request->nama,
                'tempat_lahir' => $request->tempat_lahir,
                'tgl_th_lahir' => $request->tgl_th_lahir,
                'jekel' => $request->jekel,
                'alamat' => $request->alamat,
                'tahun_masuk' => $request->tahun_masuk,
                'tahun_selesai' => $request->tahun_selesai,
                'gambar' => $gambar->hashName()
            ]);

            if($anggota) {
                return redirect('/dashboard/anggota/anggota')->with('success', 'Update data berhasil');
            }else {
                return redirect('/dashboard/anggota/anggota')->with('success', 'Update data gagal');
            }
        }else {
            $anggota = $anggota->update([
                'divisi_id' => $request->divisi_id,
                'status_id' => $request->status_id,
                'agama_id' => $request->agama_id,
                'nohp' => $request->nohp,
                'nim' => $request->nim,
                'nama' => $request->nama,
                'tempat_lahir' => $request->tempat_lahir,
                'tgl_th_lahir' => $request->tgl_th_lahir,
                'jekel' => $request->jekel,
                'alamat' => $request->alamat,
                'tahun_masuk' => $request->tahun_masuk,
                'tahun_selesai' => $request->tahun_selesai,
            ]);

            if($anggota) {
                return redirect('/dashboard/anggota/anggota')->with('success', 'Update data berhasil');
            }else {
                return redirect('/dashboard/anggota/anggota')->with('success', 'Update data gagal');
            }
        }

    }


    public function delete(Request $request) {
        $id = $request->id;
        $anggota = Anggota::find($id);
        $gambar = $anggota->gambar;

        Storage::delete('public/anggota/'. $gambar);

        $anggota = $anggota->delete();


        if($anggota) {
            return redirect('/dashboard/anggota/anggota')->with('success', 'Delete data berhasil');
        }else {
            return redirect('/dashboard/anggota/anggota')->with('success', 'Delete data gagal');
        }
    }


    public function laporan() {

        return view('dashboard.anggota.anggota.laporan', [
            'title' => 'RTIK | Anggota',
            'sub_title' => 'Dashboard/Anggota/Laporan',
            'user' => Auth::user(),
            'anggota' => Anggota::all(),
            'status' => Status::all()
        ]);
    }



    public function cetakLaporan($id) {
        $id = $id;
        $status = Status::all()->where('id', $id)->value('status');
        $anggota = Anggota::all()->where('status_id', $id);

        $pdf = PDF::loadview('dashboard.anggota.anggota.cetak', [
            'anggota' => $anggota,
            'status' => $status
        ]);

        return $pdf->stream('laporan-anggota.pdf');
    }
}
