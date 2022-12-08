@extends('dashboard.layouts.mainUser')

@section('content-user')
<div class="row d-flex justify-content-lg-center ">
    <div class="col-lg-2 col-xl-2 p-2 m-2 d-lg-block d-xl-block d-none">
        <div class="card p-2 shadow d-flex align-items-center">
            <img src="/storage/anggota/{{  $artikel[$id]->anggota->gambar }}" alt="{{ $artikel[$id]->anggota->nama }}" class="card-img-top img-profil-artikel-view">
            <div class="mt-3">
            <small class="d-block">Nama : {{ $artikel[$id]->anggota->nama }}</small>
            <small class="d-block">Nim : {{ $artikel[$id]->anggota->nim }}</small>
            <small class="d-block">Divisi : {{ $artikel[$id]->anggota->divisi->divisi }}</small>
            <small class="d-block">Angkatan : {{ $artikel[$id]->anggota->angkatan->angkatan }}</small>
        </div>
        </div>
    </div>
    <div class="col-lg-8 col-xl-8 col-md-8 m-2 p-4">
        <img src="/storage/artikel/{{ $artikel[$id]->gambar }}" alt="{{ $artikel[$id]->judul }}" class="card-img-top">
        <div class="mt-5">
            <h2 class="text-center"><b>{{ $artikel[$id]->judul }}</b></h2>
        </div>
        <div class="mt-5">
            <article>
                {!! $artikel[$id]->isi !!}
            </article>
        </div>
    </div>
</div>
@endsection
