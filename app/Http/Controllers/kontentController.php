<?php

namespace App\Http\Controllers;

use App\Models\Kontent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class kontentController extends Controller
{

    public function index() {

        $konten = DB::table('kontents')->paginate(2);

        return view('dashboard.anggota.konten.index', [
            'title' => 'RTIK | Konten',
            'sub_title' => 'Dashboard/Konten',
            'user' => Auth::user(),
            'konten' => $konten
        ]);
    }



    public function create() {

        return view('dashboard.anggota.konten.create', [
            'title' => 'RTIK | Konten',
            'sub_title' => 'Dashboard/Konten/Create',
            'user' => Auth::user()
        ]);
    }


    public function create_aksi(Request $request) {

        $validasi = $request->validate([
            'isi' => 'required'
        ]);

        $konten = Kontent::create([
            'isi' => $request->isi
        ]);


        if($konten) {
            return redirect('/dashboard/anggota/konten/create')->with('success', 'Konten berhasil ditambahkan');
        }
    }


    public function delete($id) {

        $konten = Kontent::find($id);

        $konten = $konten->delete();

        if($konten){
            return redirect('/dashboard/anggota/konten')->with('success', 'Konten berhasil dihapus');
        }
    }


    public function update($id){
        $konten = Kontent::find($id);

        return view('dashboard.anggota.konten.update',[
            'title' => 'RTIK | Konten',
            'sub_title' => 'Dashboard/Konten/Update',
            'user' => Auth::user(),
            'konten' => $konten
        ]);
    }


    public function update_aksi(Request $request, $id) {
        $konten = Kontent::find($id);

        $validasi = $request->validate([
            'isi' => 'required'
        ]);

        $konten = $konten->update([
            'isi' => $request->isi
        ]);

        if($konten){
            return redirect('/dashboard/anggota/konten')->with('success', 'Update konten berhasil');
        }
    }
}
