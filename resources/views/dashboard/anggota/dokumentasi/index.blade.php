@extends('dashboard.layouts.main')

@section('content')
<div class="row d-flex justify-content-center">
    <div class="col-lg-5 card shadow m-4 p-4">
        <h5><i class="fa-solid fa-plus"></i> Dokumentasi</h5>
        <hr>
        <form action="/dashboard/anggota/dokumentasi/create" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mt-3">
                <label for="gambar">Gambar</label>
                <input type="file" name="gambar" id="gambar" class="form-control @error('gambar') is-invalid @enderror" value="{{ old('gambar') }}" required>
            </div>
            @error('gambar')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror
            <div class="mt-5 d-flex justify-content-end">
                <button type="submit" class="btn btn-tambah">simpan</button>
            </div>
        </form>
    </div>
</div>
<div class="row d-flex justify-content-center">
    @foreach ($dokumentasi as $row)
    <div class="col-lg-2 card shadow m-1 img-dokumentasi p-2">
        <img src="/storage/dokumentasi/{{ $row->file }}" alt="{{ $row->file }}" class="card-img-top ">
        <div class="d-flex justify-content-end">
            <form action="/dashboard/anggota/dokumentasi/delete/{{ $row->id }}" method="post">
            @csrf
            @method('put')
            <button type="submit" class="btn"><i class="fa-solid fa-trash text-danger"></i></button>
            </form>
        </div>
    </div>
    @endforeach
</div>
<div class="d-flex justify-content-end mt-2">
    {{ $dokumentasi->links() }}
</div>
@endsection
