<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Pendaftar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class pendaftarController extends Controller
{

    public function index() {

        return view('dashboard.anggota.pendaftar.index', [
            'title' => 'RTIK | Pendaftar',
            'sub_title' => 'Dashboard/Pendaftar',
            'user' => Auth::user(),
            'data' => Pendaftar::all()


        ]);
    }


    public function detail($id) {

        return view('dashboard.anggota.pendaftar.detail', [
            'title' => 'RTIK | Pendaftar',
            'sub_title' => 'Dashboard/Pendaftar',
            'user' => Auth::user(),
            'data' => Pendaftar::find($id)
        ]);
    }


    public function delete($id) {
        $pendaftar = Pendaftar::find($id);

        Storage::delete('public/pendaftar/'. $pendaftar->gambar);

        $pendaftar = $pendaftar->delete();

        if($pendaftar) {
            return redirect('/dashboard/anggota/pendaftar')->with('success', 'Delete data berhasil');
        }
    }


    public function laporan() {
        $tahun = DB::table('pendaftars')->select('tahun_masuk')->groupBy('tahun_masuk')->get();
        return view('dashboard.anggota.pendaftar.laporan', [
            'title' => 'RTIK | Pendaftar',
            'sub_title' => 'Dashboard/Pendaftar/Laporan',
            'user' => Auth::user(),
            'pendaftar' => Pendaftar::all(),
            'tahun' => $tahun
        ]);
    }



    public function cetakLaporan($tahun_masuk) {
        $pendaftar = Pendaftar::all()->where('tahun_masuk', $tahun_masuk);
        $tahun = Pendaftar::all()->where('tahun_masuk', $tahun_masuk)->value('tahun_masuk');

        $pdf = PDF::loadview('dashboard.anggota.pendaftar.cetak', [
            'pendaftar' => $pendaftar,
            'tahun' => $tahun
        ])->setpaper('A4', 'landscape');

        return $pdf->stream('laporan-pendaftar.pdf');
    }
}
