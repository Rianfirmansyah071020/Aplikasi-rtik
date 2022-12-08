@extends('dashboard.layouts.main')

@section('content')
<div class="row d-flex justify-content-lg-center">

    @if($sub_title === 'Dashboard/Anggota/Akun/Update')

    <div class="card col-lg-4 m-1 p-3 shadow">
        <h6><i class="fa-regular fa-pen-to-square"></i> Form Update akun</h6>
        <hr>
        <form action="/dashboard/anggota/akun/update/{{ $akun->id }}" method="post">
            @csrf
            @method('put')
            <input type="hidden" name="anggota_id" value="{{ $akun->anggota_id }}">
            <div class="mt-2">
                <label for="nim">Nama</label>
                <select name="nim" id="nim" class="form-control">
                    <option value="">pilih</option>
                    @foreach ($anggota as $row)
                        <option value="{{ $row->id }}"  @if($row->id === $akun->anggota_id) @selected(true) @endif>{{ $row->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mt-2">
                <label for="email">Email</label>
                <input type="email" name="email" value="{{ $akun->email }}" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="masukan email contoh contoh@gmail.com" required>
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mt-2">
                <label for="password">Password</label>
                <input type="password" name="password" value="{{ $akun->password }}" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="masukan password" required>
                @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <hr>
            <div class="mt-3 d-flex justify-content-end">
                <a href="/dashboard/anggota/akun" class="btn shadow">kembali</a>
                <button type="submit" class="btn btn-tambah">simpan</button>

            </div>
        </form>
    </div>

    @else
    <div class="card col-lg-4 m-1 p-3 shadow">
        <h6><i class="fa-solid fa-plus"></i> Form tambah akun</h6>
        <hr>
        <form action="/dashboard/anggota/akun/create" method="post">
            @csrf
            <div class="mt-2">
                <label for="anggota_id">Nama</label>
                <select name="anggota_id" id="anggota_id" class="form-control">
                    <option value="">pilih</option>
                    @foreach ($anggota as $row)
                        <option value="{{ $row->id }}">{{ $row->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mt-2">
                <label for="email">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="masukan email contoh contoh@gmail.com" required>
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mt-2">
                <label for="password">Password</label>
                <input type="password" name="password" value="{{ old('password') }}" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="masukan password" required>
                @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <hr>
            <div class="mt-3 d-flex justify-content-end">
                <button type="submit" class="btn btn-tambah">simpan</button>
            </div>
        </form>
    </div>
    @endif

    <div class="col-lg-7">
        <div class="card shadow mt-2">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Akun</h6>
            </div>
            <div class="table-responsive">
                <div class="card-body">
                     <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                         <thead>
                             <tr>
                                 <th class="text-center">No</th>
                                 <th class="text-center">Email</th>
                                 <th class="text-center">Level</th>
                                 <th class="text-center">Opsi</th>
                             </tr>
                         </thead>
                         <tbody>
                            @foreach ($data as $row)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $row->email }}</td>
                                <td>{{ $row->level }}</td>
                                <td>
                                    <form action="/dashboard/anggota/akun/delete/{{ $row->id }}" method="post">
                                        @csrf
                                        @method('put')
                                        <div class="d-flex justify-content-center
                                        align-items-lg-center">
                                        <a href="/dashboard/anggota/akun/detail/{{ $row->id }}" class="btn text-primary">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                            <a href="/dashboard/anggota/akun/update/{{ $row->id }}" class="btn text-info">
                                                <i class="fa-regular fa-pen-to-square"></i>
                                            </a>
                                            <button type="submit" class="btn text-danger" onclick="return confirm('Anda ingin menghapus data ini ?')">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
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
