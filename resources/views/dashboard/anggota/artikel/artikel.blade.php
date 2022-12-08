@extends('dashboard.layouts.main')

@section('content')
<div class="row card bg-light shadow p-4 mt-3">
    <h3 class="artikel-judul">Artikel <i class="fa-solid fa-file-lines"></i></h3>
    <h5>Upload Artikel</h5>
</div>
<div class="row d-flex justify-content-center">
    <div class="col-lg-12 card p-4">
        <form action="/dashboard/anggota/artikel/create" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="anggota_id" value="{{ $user->anggota->id }}">
            <div class="mt-3">
                <label for="kategori_id">Kategori</label>
                <select name="kategori_id" id="kategori_id" class="form-control" required>
                    <option value="">pilih</option>
                    @foreach ($kategori as $row)
                        <option value="{{ $row->id }}" @if($row->id === old('kategori')) @selected(true) @endif>{{ $row->kategori }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mt-3">
                <label for="judul">Judul</label>
                <input type="text" name="judul" id="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul') }}" placeholder="masukan judul" required>
            </div>
            @error('judul')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="mt-3">
                <label for="isi">Isi</label>
                <input type="hidden" name="isi" id="isi" required>
                <trix-editor input="isi"></trix-editor>
            </div>
            <div class="mt-3">
                <label for="gambar">Gambar</label>
                <input type="file" name="gambar" id="gambar" class="form-control @error('gambar') is-invalid @enderror" required>
            </div>
            @error('judul')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="mt-5 d-flex justify-content-end">
                <a href="/dashboard/anggota/artikel" class="btn mr-3">kembali</a>
                <button type="submit" class="btn btn-tambah">simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
