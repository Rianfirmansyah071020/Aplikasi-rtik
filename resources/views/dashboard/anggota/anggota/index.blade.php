@extends('dashboard.layouts.main')

@section('content')
<div class="row card card-tambah">
    <div class="col-6 col-aksi">
        <a href="/dashboard/anggota/anggota/create" class="btn btn-tambah shadow">
            <i class="fa-regular fa-plus"></i>
            tambah
        </a>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-header">
                <h6>Data Anggota</h6>
            </div>
            <div class="table-responsive">
                <div class="card-body">
                    <table class="table table-bordered table-hover" id="dataTable">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">NIM</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $row)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $row->nim }}</td>
                                <td>{{ $row->nama }}</td>
                                <td>{{ $row->status->status }}</td>
                                <td>
                                    <div class="d-flex justify-content-center align-items-center">
                                        <a href="/dashboard/anggota/anggota/detail/{{ $row->id }}" class="btn text-primary">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                        <a href="/dashboard/anggota/anggota/update/{{ $row->id }}" class="btn text-info">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </a>

                                        <form action="/dashboard/anggota/anggota/delete/{{ $row->id }}" method="post">
                                        @csrf
                                        @method('put')
                                        <button type="submit" class="btn text-danger" onclick="return confirm('apakah anda ingin menghapus data ?')">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
