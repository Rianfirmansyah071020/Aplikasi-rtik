<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class statusController extends Controller
{
    public function index() {

        $data = Status::all();
        $user = Auth::user();

        return view('dashboard.anggota.status.index',[
            'title' => 'RTIK | Status',
            'sub_title' => 'Dashboard/Status',
            'data' => $data,
            'user' => $user
        ]);
    }

    public function create(Request $request) {

        $validasi = $request->validate([
            'status' => 'unique:statuses,status|max:30'
        ]);

        $status = Status::create([
            'status' => $request->status
        ]);

        if($status) {
            return redirect('/dashboard/anggota/status')->with('success', 'Data berhasil disimpan');
        }else {
            return redirect('/dashboard/anggota/status')->with('success', 'Data gagal disimpan');
        }

    }


    public function delete(Request $request) {

        // $divisi = DB::table('divisis')->where('id', $request->id)->delete();

        $status = Status::find($request->id)->delete();

        if($status) {
            return redirect('/dashboard/anggota/status')->with('success', 'Data berhasil di hapus');
        }else {
            return redirect('/dashboard/anggota/status')->with('success', 'Data gagal di hapus');
        }

    }

    public function update(Request $request) {
        $status = Status::find($request->id);
        $data = Status::all();
        $user = Auth::user();

        return view('dashboard.anggota.status.index', [
            'title' => 'RTIK | Status',
            'sub_title' => 'Dashboard/Status/Update',
            'data' => $data,
            'status' => $status,
            'user' => $user
        ]);
    }

    public function update_aksi(Request $request, $id) {

        $validasi = $request->validate([
            'status' => 'unique:statuses,status'
        ]);

        $status = Status::find($id)->update([
            'status' => $request->status
        ]);

        if($status){
            return redirect('/dashboard/anggota/status')->with('success', 'Update data berhasil');
        }else {
            return redirect('/dashboard/anggota/status')->with('success', 'Update data gagal');
        }
    }
}
