@extends('dashboard.layouts.main')

@section('content')
<div class="row d-lg-flex justify-content-lg-center">
    <div class="col-lg-5 card shadow m-1 card-content-img p-2">
        <img src="/storage/anggota/{{ $data->gambar }}" alt="{{ $data->nama }}" class="card-img-top img-detail">
    </div>
    <div class="col-lg-6 card shadow m-1 p-4">
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><b>Nama</b> : {{ $data->nama }}</li>
            <li class="list-group-item"><b>NIM</b> : {{ $data->nim }}</li>
            <li class="list-group-item"><b>No HP / WA</b> : {{ $data->nohp }}</li>
            <li class="list-group-item"><b>Divisi</b> : {{ $data->divisi->divisi }}</li>
            <li class="list-group-item"><b>Status</b> : {{ $data->status->status }}</li>
            <li class="list-group-item"><b>Angkatan</b> : {{ $data->angkatan->angkatan }}</li>
            <li class="list-group-item"><b>Tempat Lahir</b> : {{ $data->tempat_lahir }}</li>
            <li class="list-group-item"><b>Tanggal / Tahun Lahir</b> : {{ $data->tgl_th_lahir }}</li>
            <li class="list-group-item"><b>Jenis Kelamin</b> : {{ $data->jekel }}</li>
            <li class="list-group-item"><b>Agama</b> : {{ $data->agama->agama }}</li>
            <li class="list-group-item"><b>Alamat</b> : {{ $data->alamat }}</li>
            <li class="list-group-item"><b>Tahun Masuk</b> : {{ $data->tahun_masuk }}</li>
            <li class="list-group-item"><b>Tahun Selesai</b> : {{ $data->tahun_selesai }}</li>
            <li class="list-group-item">
                <div class="d-flex justify-content-end">
                    <a href="/dashboard/anggota/anggota" class="btn btn-tambah">kembali</a>
                </div>
            </li>
          </ul>
    </div>
</div>
@endsection
