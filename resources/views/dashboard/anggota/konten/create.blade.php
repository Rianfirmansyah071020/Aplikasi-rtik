@extends('dashboard.layouts.main')

@section('content')
<div class="row card shadow p-3 mt-2">
    <h5><i class="fa-solid fa-plus"></i> Form tambah konten</h5>
</div>
<div class="row mt-2 p-4 shadow card">
    <form action="/dashboard/anggota/konten/create" method="post">
        @csrf
        <div class="mt-3">
            <label for="isi">Isi</label>
            <input type="hidden" name="isi" id="isi" value="{{ old('isi') }}" required>
            <trix-editor input="isi"></trix-editor>
        </div>
        <div class="mt-3 d-flex justify-content-end">
            <a href="/dashboard/anggota/konten" class="btn mr-3">kembali</a>
            <button type="submit" class="btn btn-tambah">simpan</button>
        </div>
    </form>
</div>
@endsection
