@extends('dashboard.layouts.main')

@section('content')
<div class="row d-lg-flex justify-content-lg-center">
    <div class="col-lg-5 card shadow m-1 card-content-img p-2">
        <img src="/storage/anggota/{{ $data->anggota->gambar }}" alt="{{ $data->anggota->nama }}" class="card-img-top img-detail">
    </div>
    <div class="col-lg-6 card shadow m-1 p-4">
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><b>Email</b> : {{ $data->email }}</li>
            <li class="list-group-item"><b>Nama</b> : {{ $data->anggota->nama }}</li>
            <li class="list-group-item"><b>NIM</b> : {{ $data->anggota->nim }}</li>
            <li class="list-group-item"><b>Divisi</b> : {{ $data->anggota->divisi->divisi }}</li>
            <li class="list-group-item"><b>Status</b> : {{ $data->anggota->status->status }}</li>
            <li class="list-group-item"><b>Tempat Lahir</b> : {{ $data->anggota->tempat_lahir }}</li>
            <li class="list-group-item"><b>Tanggal / Tahun Lahir</b> : {{ $data->anggota->tgl_th_lahir }}</li>
            <li class="list-group-item"><b>Agama</b> : {{ $data->anggota->agama->agama }}</li>
            <li class="list-group-item"><b>Alamat</b> : {{ $data->anggota->alamat }}</li>
            <li class="list-group-item">
                <div class="d-flex justify-content-end">
                    <a href="/dashboard/anggota/akun" class="btn btn-tambah">kembali</a>
                </div>
            </li>
          </ul>
    </div>
</div>
@endsection
