@extends('dashboard.layouts.main')

@section('content')
<div class="row mt-4">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-header">
                <h6>Data Pendatar</h6>
            </div>
            <div class="table-responsive">
                <div class="card-body">
                    <table class="table table-bordered table-hover" id="dataTable">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">NIM</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $row)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $row->nim }}</td>
                                <td>{{ $row->nama }}</td>
                                <td>
                                    <div class="d-flex justify-content-center align-items-center">
                                        <a href="/dashboard/anggota/pendaftar/detail/{{ $row->id }}" class="btn text-primary">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                        <form action="/dashboard/anggota/pendaftar/delete/{{ $row->id }}" method="post">
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
