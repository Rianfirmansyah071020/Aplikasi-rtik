@extends('dashboard.layouts.mainUser')

@section('content-user')
<div class="row d-flex card shadow bg-white p-4">
    <h3 class="text-center text-bold">Artikel Tentang <b class="text-primary">{{ $namaKategori }}</b></h3>
</div>
<div class="row d-flex justify-content-lg-center">
    @foreach ($artikel as $row)
        <div class="col-lg-4 card shadow m-2 p-3">
            <div class="d-flex justify-content-start align-items-center">
                <img src="/storage/anggota/{{ $row->anggota->gambar }}" alt="{{ $row->anggota->nama }}" class="img-profil-artikel">
                <small class="ml-3">{{ $row->anggota->nama }}  |</small>
                <small class="ml-3 text-primary">{{ $row->created_at->diffForHumans() }}</small>
            </div>
            <hr>
            <h5 class="text-center mb-4">
                <b>{{ $row->judul }}</b>
            </h5>
            <img src="/storage/artikel/{{ $row->gambar }}" alt="{{ $row->judul }}" class="card-img-top">
            <div class="mt-3">
                <article>
                    {!! $row->ringkasan !!}
                </article>
            </div>
            <div class="d-flex justify-content-end">
                <a href="/artikel/view/{{ $row->id }}" class="text-link">lainnya...</a>
            </div>
        </div>
    @endforeach
</div>
@endsection
