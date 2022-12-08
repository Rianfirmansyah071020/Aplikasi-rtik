@extends('dashboard.layouts.main')

@section('content')
    <div class="row card shadow p-4 mt-2">
        <div class="col">
            <a href="/dashboard/anggota/konten/create" class="btn btn-tambah">tambah</a>
        </div>
    </div>
<div class="row d-flex justify-content-center mt-3">
    @foreach ($konten as $row)
        <div class="card col-12 shadow p-4 m-2">
            <article>{!! $row->isi !!}</article>
            <hr>
            <div class="d-flex justify-content-end p-3">
                <a href="/dashboard/anggota/konten/update/{{ $row->id }}" class="btn">
                    <i class="fa-regular fa-pen-to-square text-info"></i>
                </a>

                <form action="/dashboard/anggota/konten/delete/{{ $row->id }}" method="post">
                    @csrf
                    @method('put')
                    <button type="submit" class="btn" onclick="return confirm('Anda yakin menghapus data ini ?')">
                        <i class="fa-solid fa-trash text-danger"></i>
                    </button>
                </form>
            </div>
        </div>
    @endforeach
</div>
<div class="mt-3 d-flex justify-content-end">
    {{ $konten->links() }}
</div>
@endsection
