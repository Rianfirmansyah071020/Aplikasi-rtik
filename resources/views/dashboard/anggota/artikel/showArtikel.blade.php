@extends('dashboard.layouts.main')

@section('content')
<div class="row card d-flex justify-content-lg-center p-3 shadow mt-3">
    <div class="flex justify-content-center">
        <img src="/storage/anggota/{{ $artikel->anggota->gambar }}" alt="{{ $artikel->anggota->nama }}" class="img-penulis-artikel-show">
        <small>{{ $artikel->anggota->nama }}</small> |
        <small class="text-primary ml-1">{{ $artikel->created_at->diffForHumans() }}</small>
    </div>
    <hr>
    <img src="/storage/artikel/{{ $artikel->gambar }}" alt="" class="card-img-top">
    <h2 class="text-center text-bold mb-3 mt-5">"{{ $artikel->judul }}"</h2>

    <article class="p-3">
        {!! $artikel->isi !!}
    </article>
    <div class="mt-3 d-flex justify-content-end">
        <a href="/dashboard/anggota/artikel" class="btn btn-tambah">kembali</a>
    </div>
</div>
@endsection
