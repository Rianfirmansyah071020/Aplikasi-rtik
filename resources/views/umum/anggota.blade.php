@extends('dashboard.layouts.mainUser')

@section('content-user')
<div class="row d-flex card shadow bg-white p-4">
    <h3 class="text-center text-bold"><b class="text-primary">{{ $namaStatus }}</b> Relawan TIK Komisariat STMIK Indonesia Padang</h3>
</div>
<div class="row d-flex justify-content-lg-center mt-5">
    @foreach ($anggota as $row)
        <div class="card col-lg-2 col-xl-2 pt-2 pb-2 m-2 card-profil-anggota">
            <div class="d-flex justify-content-center align-items-center">
            <div class="img-card">
                <img src="/storage/anggota/{{ $row->gambar }}" alt="{{ $row->nama }}" class="card-img-sub">
            </div>
            </div>
            <div class="mt-3 d-block">
                <small class="profil-anggota">Nama : {{ $row->nama }}</small>
                <small class="profil-anggota">Nim : {{ $row->nim }}</small>
                <small class="profil-anggota">Divisi : {{ $row->divisi->divisi }}</small>
                <small class="profil-anggota">Angkatan : {{ $row->angkatan->angkatan }}</small>
                <small class="profil-anggota">Tahun Masuk : {{ $row->tahun_masuk }}</small>
            </div>
        </div>
    @endforeach
</div>

@endsection
