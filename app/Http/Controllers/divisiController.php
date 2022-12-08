<?php

namespace App\Http\Controllers;


use App\Models\Divisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class divisiController extends Controller
{
    public function index() {

        $data = Divisi::all();
        $user = Auth::user();

        return view('dashboard.anggota.divisi.index',[
            'title' => 'RTIK | Divisi',
            'sub_title' => 'Dashboard/Divisi',
            'data' => $data,
            'user' => $user
        ]);
    }

    public function create(Request $request) {

        $validasi = $request->validate([
            'divisi' => 'unique:divisis,divisi|max:30|required'
        ]);

        $divisi = Divisi::create([
            'divisi' => $request->divisi
        ]);

        if($divisi) {
            return redirect('/dashboard/anggota/divisi')->with('success', 'Data berhasil disimpan');
        }else {
            return redirect('/dashboard/anggota/divisi')->with('success', 'Data gagal disimpan');
        }

    }


    public function delete(Request $request) {

        // $divisi = DB::table('divisis')->where('id', $request->id)->delete();

        $divisi = Divisi::find($request->id)->delete();

        if($divisi) {
            return redirect('/dashboard/anggota/divisi')->with('success', 'Data berhasil di hapus');
        }else {
            return redirect('/dashboard/anggota/divisi')->with('success', 'Data gagal di hapus');
        }

    }

    public function update(Request $request) {
        $divisi = Divisi::find($request->id);
        $data = Divisi::all();
        $user = Auth::user();

        return view('dashboard.anggota.divisi.index', [
            'title' => 'RTIK | Divisi',
            'sub_title' => 'Dashboard/Divisi/Update',
            'data' => $data,
            'divisi' => $divisi,
            'user' => $user
        ]);
    }

    public function update_aksi(Request $request, $id) {

        $validasi = $request->validate([
            'divisi' => 'unique:divisis,divisi'
        ]);

        $divisi = Divisi::find($id)->update([
            'divisi' => $request->divisi
        ]);

        if($divisi){
            return redirect('/dashboard/anggota/divisi')->with('success', 'Update data berhasil');
        }else {
            return redirect('/dashboard/anggota/divisi')->with('success', 'Update data gagal');
        }
    }

}
