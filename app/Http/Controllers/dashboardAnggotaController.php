<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class dashboardAnggotaController extends Controller
{
    public function dashboard() {
        $user = Auth::user();
        $anggota = DB::table('anggotas')->count();
        $pendaftar = DB::table('pendaftars')->count();
        $artikel = DB::table('artikels')->count();
        return view('dashboard.anggota.dashboard', [
            'title' => 'Dashboard',
            'sub_title' => '/Dashboard',
            'user' => $user,
            'anggota' => $anggota,
            'pendaftar' => $pendaftar,
            'artikel' => $artikel
        ]);
    }
}
