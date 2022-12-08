@extends('dashboard.layouts.main')

@section('content')
<div class="row card p-4 mt-1">
    <div class="col">
        <a href="/dashboard/anggota/artikel/create" class="btn btn-tambah">tambah</a>
    </div>
</div>
<div class="row d-flex justify-content-lg-center mt-3">
@foreach ($artikel as $data)
    <div class="col-lg-4">
        <div class="card m-1 p-3 shadow">
            <div class="flex justify-content-center">
                <img src="/storage/anggota/{{ $data->anggota->gambar }}" alt="{{ $data->anggota->nama }}" class="img-penulis-artikel">
                <small>{{ $data->anggota->nama }}</small>
            </div>
            <div class="d-flex justify-content-end">
                <small class="text-primary">{{ $data->created_at->diffForHumans() }}</small>
            </div>
            <hr>
            <div class="judul-artikel">
                <h5>{{ $data->judul }}</h5>
            </div>
            <img src="/storage/artikel/{{ $data->gambar }}" alt="{{ $data->judul }}" class="img-card-top">
            <hr>
            <div class="ringkasan">
                <article>
                    {!! $data->ringkasan !!}
                </article>
        </div>
        <hr>
        <div class="d-flex justify-content-center">
            <a href="/dashboard/anggota/artikel/show/{{ $data->id }}" class="btn text-primary">
                <i class="fa-solid fa-eye"></i>
            </a>
            <a href="/dashboard/anggota/artikel/update/{{ $data->id }}" class="btn text-info">
                <i class="fa-regular fa-pen-to-square"></i>
            </a>

            <form action="/dashboard/anggota/artikel/delete/{{ $data->id }}" method="post">
                @csrf
                @method('put')
            <button type="submit" class="btn">
                <i class="fa-solid fa-trash text-danger"></i>
            </button>
            </form>
        </div>
    </div>
    </div>
@endforeach
</div>
<div class="d-flex justify-content-end">
    {{ $artikel->links() }}
</div>
@endsection
