<?php

namespace App\Http\Controllers;

use App\Models\Angkatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class angkatanController extends Controller
{

    public function index() {

        $data = Angkatan::all();
        $user = Auth::user();

        return view('dashboard.anggota.angkatan.index',[
            'title' => 'RTIK | Angkatan',
            'sub_title' => 'Dashboard/Angkatan',
            'data' => $data,
            'user' => $user
        ]);
    }

    public function create(Request $request) {

        $validasi = $request->validate([
            'angkatan' => 'unique:angkatans,angkatan|max:30|required'
        ]);

        $angkatan = Angkatan::create([
            'angkatan' => $request->angkatan
        ]);

        if($angkatan) {
            return redirect('/dashboard/anggota/angkatan')->with('success', 'Data berhasil disimpan');
        }else {
            return redirect('/dashboard/anggota/angkatan')->with('success', 'Data gagal disimpan');
        }

    }


    public function delete(Request $request) {

        // $divisi = DB::table('divisis')->where('id', $request->id)->delete();

        $angkatan = Angkatan::find($request->id)->delete();

        if($angkatan) {
            return redirect('/dashboard/anggota/angkatan')->with('success', 'Data berhasil di hapus');
        }else {
            return redirect('/dashboard/anggota/angkatan')->with('success', 'Data gagal di hapus');
        }

    }

    public function update(Request $request) {
        $angkatan = Angkatan::find($request->id);
        $data = Angkatan::all();
        $user = Auth::user();

        return view('dashboard.anggota.angkatan.index', [
            'title' => 'RTIK | Angkatan',
            'sub_title' => 'Dashboard/Angkatan/Update',
            'data' => $data,
            'angkatan' => $angkatan,
            'user' => $user
        ]);
    }

    public function update_aksi(Request $request, $id) {

        $validasi = $request->validate([
            'angkatan' => 'unique:angkatans,angkatan'
        ]);

        $angkatan = Angkatan::find($id)->update([
            'angkatan' => $request->angkatan
        ]);

        if($angkatan){
            return redirect('/dashboard/anggota/angkatan')->with('success', 'Update data berhasil');
        }else {
            return redirect('/dashboard/anggota/angkatan')->with('success', 'Update data gagal');
        }
    }
}
