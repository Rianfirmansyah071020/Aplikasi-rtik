@extends('dashboard.layouts.main')

@section('content')
<div class="row d-flex justify-content-center align-items-center mt-3">
    <div class="card col-10 d-flex justify-content-center align-items-center p-3 ">
        <img src="/storage/anggota/{{ $data->gambar }}" alt="{{ $data->nama }}" class="img-detail-update">
    </div>
</div>
<form action="/dashboard/anggota/anggota/update" method="post" enctype="multipart/form-data">
    @method('put')
    @csrf
    <input type="hidden" name="id" value="{{ $data->id }}">
<div class="row d-lg-flex justify-content-lg-center mt-1">
    <div class="col-lg-5 col-12 card p-4 m-2">
        @if (session('success'))
            <div class="alert alert-primary">{{ session('success') }}</div>
        @endif
        <div>
            <label for="divisi_id" class="d-block">Divisi</label>
            @foreach ($divisi as $row)
                <input type="radio" name="divisi_id" class="@error('divisi_id') is-invalid @enderror"  value="{{ $row->id }}" @if($row->id === $data->divisi_id) @checked(true) @endif> {{ $row->divisi }}
            @endforeach
            @error('divisi_id')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <hr>
        <div>
            <label for="status_id" class="d-block">Status</label>
            @foreach ($status as $row)
                <input type="radio" name="status_id" class="@error('status_id') is-invalid @enderror" value="{{ $row->id }}" @if($row->id === $data->status_id) @checked(true) @endif > {{ $row->status }}
            @endforeach
            @error('status_id')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <hr>
        <div>
            <label for="agama_id" class="d-block">Agama</label>
            @foreach ($agama as $row)
                <input type="radio" name="agama_id" class="@error('agama_id') is-invalid @enderror" value="{{ $row->id }}" @if($row->id === $data->agama_id) @checked(true) @endif > {{ $row->agama }}
            @endforeach
            @error('agama_id')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <hr>
        <div>
            <label for="angkatan_id">Angkatan</label>
            <select name="angkatan_id" id="angkatan_id" class="form-control @error('angkatan_id') is-invalid @enderror" required>
                <option value="">pilih</option>
                @foreach ($angkatan as $row)
                    <option value="{{ $row->id }}" @if($row->id === $data->angkatan_id) @selected(true) @endif>{{ $row->angkatan }}</option>
                @endforeach
            </select>
        </div>
        <hr>
        <div>
            <label for="nohp" class="d-block">No Hp / WA</label>
            <input type="text" name="nohp" id="nohp" class="form-control @error('nohp') is-invalid @enderror" placeholder="masukan nohp" value="{{ $data->nohp }}" required>
            @error('nohp')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <hr>
        <div>
            <label for="nim" class="d-block">Nim</label>
            <input type="text" name="nim" id="nim" class="form-control @error('nim') is-invalid @enderror" placeholder="masukan nim" value="{{ $data->nim }}" required>
            @error('nim')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <hr>
        <div>
            <label for="nama" class="d-block">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="masukan nama" value="{{ $data->nama }}" required>
            @error('nama')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <hr>
        <div>
            <label for="tempat_lahir" class="d-block">Tempat Lahir</label>
            <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control @error('tempat_lahir') is-invalid @enderror" placeholder="masukan tempat_lahir" value="{{ $data->tempat_lahir }}" required>
            @error('tempat_lahir')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>

    <div class="col-lg-5 col-12 card p-4 m-2">
        <div>
            <label for="tgl_th_lahir" class="d-block">Tanggal/Tahun Lahir</label>
            <input type="date" name="tgl_th_lahir" id="tgl_th_lahir" class="form-control @error('tgl_th_lahir') is-invalid @enderror" placeholder="masukan tgl_th_lahir" value="{{ $data->tgl_th_lahir }}" required>
            @error('tgl_th_lahir')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <hr>
        <div>
            <label for="jekel">Jenis Kelamin</label>
            <select name="jekel" id="jekel" class="form-control @error('jekel') is-invalid @enderror" required >
                <option value="">pilih</option>
                <option value="Pria" @if($data->jekel === 'Pria') @selected(true) @enderror>Pria</option>
                <option value="Wanita" @if($data->jekel === 'Wanita') @selected(true) @enderror>Wanita</option>
            </select>
        </div>
        @error('jekel')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        <hr>
        <hr>
        <div>
            <label for="alamat" class="d-block">Alamat</label>
            <textarea name="alamat" id="alamat" cols="30" rows="3" placeholder="masukan alamat" class="form-control" required>{{ $data->alamat }}</textarea>
            @error('alamat')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <hr>
        <div>
            <label for="tahun_masuk" class="d-block">Tahun Masuk</label>
            <input type="year" name="tahun_masuk" id="tahun_masuk" class="form-control @error('tahun_masuk') is-invalid @enderror" placeholder="masukan tahun_masuk" value="{{ $data->tahun_masuk }}" required>
            @error('tahun_masuk')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <hr>
        <div>
            <label for="tahun_selesai" class="d-block">Tahun Selesai</label>
            <input type="year" name="tahun_selesai" id="tahun_selesai" class="form-control @error('tahun_selesai') is-invalid @enderror" placeholder="masukan tahun_selesai" value="{{ $data->tahun_selesai }}">
            @error('tahun_selesai')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <hr>
        <div>
            <label for="gambar" class="d-block">Gambar</label>
            <input type="file" name="gambar" id="gambar" class="form-control @error('gambar') is-invalid @enderror" placeholder="masukan gambar">
            <input type="hidden" name="gambarLama" value="{{ $data->gambar }}">
            @error('gambar')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
</div>
<div class="d-flex justify-content-end pr-5">
    <a href="/dashboard/anggota/anggota" class="btn mr-3">kembali</a>
    <button type="submit" class="btn btn-tambah">simpan</button>
</div>
</form>
@endsection
