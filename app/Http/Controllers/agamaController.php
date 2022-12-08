<?php

namespace App\Http\Controllers;

use App\Models\Agama;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class agamaController extends Controller
{

    public function index() {

        $data = Agama::all();
        $user = Auth::user();

        return view('dashboard.anggota.agama.index',[
            'title' => 'RTIK | Agama',
            'sub_title' => 'Dashboard/Agama',
            'data' => $data,
            'user' => $user
        ]);
    }

    public function create(Request $request) {

        $validasi = $request->validate([
            'agama' => 'unique:agamas,agama|max:30|required'
        ]);

        $agama = Agama::create([
            'agama' => $request->agama
        ]);

        if($agama) {
            return redirect('/dashboard/anggota/agama')->with('success', 'Data berhasil disimpan');
        }else {
            return redirect('/dashboard/anggota/agama')->with('success', 'Data gagal disimpan');
        }

    }


    public function delete(Request $request) {

        // $divisi = DB::table('divisis')->where('id', $request->id)->delete();

        $agama = Agama::find($request->id)->delete();

        if($agama) {
            return redirect('/dashboard/anggota/agama')->with('success', 'Data berhasil di hapus');
        }else {
            return redirect('/dashboard/anggota/agama')->with('success', 'Data gagal di hapus');
        }

    }

    public function update(Request $request) {
        $agama = Agama::find($request->id);
        $data = Agama::all();
        $user = Auth::user();

        return view('dashboard.anggota.agama.index', [
            'title' => 'RTIK | Agama',
            'sub_title' => 'Dashboard/Agama/Update',
            'data' => $data,
            'agama' => $agama,
            'user' => $user
        ]);
    }

    public function update_aksi(Request $request, $id) {

        $validasi = $request->validate([
            'agama' => 'unique:agamas,agama'
        ]);

        $agama = Agama::find($id)->update([
            'agama' => $request->agama
        ]);

        if($agama){
            return redirect('/dashboard/anggota/agama')->with('success', 'Update data berhasil');
        }else {
            return redirect('/dashboard/anggota/agama')->with('success', 'Update data gagal');
        }
    }

}


