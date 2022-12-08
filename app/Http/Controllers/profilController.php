<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use App\Models\User;
use App\Models\Agama;
use App\Models\Divisi;
use App\Models\Status;
use App\Models\Anggota;
use App\Models\Angkatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class profilController extends Controller
{
    public function profil($id) {
        $data = Anggota::find($id);
        $user = Auth::user();

        return view('dashboard.anggota.profil.profil', [
            'title' => 'RTIK | Profil',
            'sub_title' => 'Dashboard/Anggota/Profil',
            'data' => $data,
            'user' => $user
        ]);
    }

    public function setting($id) {

        $data = Anggota::find($id);
        $user = Auth::user();
        $divisi = Divisi::all();
        $status = Status::all();
        $agama = Agama::all();
        $angkatan = Angkatan::all();

        return view('dashboard.anggota.profil.setting', [
            'title' => 'RTIK | Profil',
            'sub_title' => 'Dashboard/Profil/Setting',
            'data' => $data,
            'user' => $user,
            'divisi' => $divisi,
            'status' => $status,
            'agama' => $agama,
            'angkatan' => $angkatan
        ]);
    }

    public function setting_aksi(Request $request) {

        $id = $request->id;
        $anggota = Anggota::find($id);

        $validasi = $request->validate([
            'email' => 'required|email',
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
                return redirect('/dashboard/anggota/anggota')->with('success', 'Update data berhasil');
            }else {
                return redirect('/dashboard/anggota/anggota')->with('success', 'Update data gagal');
            }
        }else {
            $anggota = $anggota->update([
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
            ]);


            $user = Auth::user();
            $id = $user->id;

           if($request->password === $user->password){
                $password = $user->password;
           }else {
                $password = Hash::make($request->password);
           }

            $users = User::find($id);
            $users = $users->update([
                'email' => $request->email,
                'password' => $password
            ]);


            if($anggota && $users) {
                return redirect('/dashboard/anggota')->with('success', 'Update data berhasil');
            }else {
                return redirect('/dashboard/anggota')->with('success', 'Update data gagal');
            }
        }

    }


}
