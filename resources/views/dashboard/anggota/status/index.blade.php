@extends('dashboard.layouts.main')

@section('content')
<div class="row d-lg-flex justify-content-lg-center">
    <div class="col-lg-4">

        @if ($sub_title === 'Dashboard/Status/Update')
            <div class="card shadow mt-3 bg-white p-3">
                <h6><i class="fa-regular fa-pen-to-square"></i> Form update status</h6>
                <hr>
                <form action="/dashboard/anggota/status/update/{{ $status->id }}" method="post" class="form-input-new">
                    @method('put')
                    @csrf
                    <div class="form-group mt-1">
                        <label for="status" class="label">Status</label>
                        <input type="text" name="status" id="status" class="form-control @error ('status') is-invalid @enderror" placeholder="masukan status" required  value="{{ $status->status }}">
                    </div>
                    @error('status')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                    <div class="mt-3 d-flex justify-content-end align-items-lg-end">
                        <a href="/dashboard/anggota/status" class="btn">kembali</a>
                        <button type="submit" class="btn btn-tambah shadow">simpan</button>
                    </div>
                </form>
            </div>

        @else
            <div class="card shadow mt-3 bg-white p-3">
                @if (session('success'))
                    <div class="alert-primary p-3 mt-2 mb-2">{{ session('success') }}</div>
                @endif
                <h6><i class="fa-solid fa-plus"></i> Form tambah status</h6>
                <hr>
                <form action="/dashboard/anggota/status/create" method="post" class="form-input-new">
                    @csrf
                    <div class="form-group mt-1">
                        <label for="status" class="label">Status</label>
                        <input type="text" name="status" id="status" class="form-control @error('status') is-invalid @enderror" placeholder="masukan status" required  value="{{ old('status') }}">
                    </div>
                    @error('status')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                    <div class="mt-3 d-flex justify-content-end align-items-lg-end">
                        <button type="submit" class="btn btn-tambah shadow">simpan</button>
                    </div>
                </form>
            </div>

        @endif

    </div>
    <div class="col-lg-8">
        <div class="card shadow mt-2">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Status</h6>
            </div>
            <div class="table-responsive">
                <div class="card-body">
                     <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                         <thead>
                             <tr>
                                 <th>No</th>
                                 <th>Status</th>
                                 <th>Opsi</th>
                             </tr>
                         </thead>
                         <tbody>
                            @foreach ($data as $row)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $row->status }}</td>
                                <td>
                                    <form action="/dashboard/anggota/status/delete/{{ $row->id }}" method="post">
                                        @csrf
                                        @method('put')
                                        <div class="d-flex justify-content-center align-items-lg-center">
                                            <button type="submit" class="btn text-danger" onclick="return confirm('Anda ingin menghapus data ini ?')">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                            <a href="/dashboard/anggota/status/update/{{ $row->id }}" class="btn text-info">
                                                <i class="fa-regular fa-pen-to-square"></i>
                                            </a>
                                        </div>
                                    </form>
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
