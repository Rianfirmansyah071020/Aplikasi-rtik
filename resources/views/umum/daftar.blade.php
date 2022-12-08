@extends('dashboard.layouts.mainUser')

@section('content-user')
<div class="row card shadow mt-3 p-4 d-flex justify-content-center">
    <h3><b class="text-info">Pemberitahuan</b></h3>
    <h5>Sebelum anda mendaftar pastikan anda sudah membaca persyarat pendaftaran yang ada pada <a href="/home" class="btn btn-tambah">Home</a></h5>
</div>
<div class="row d-flex justify-content-lg-center mt-3">
        <div class="card shadow p-4 col-lg-5 m-2">
            <form action="/daftar" method="post" enctype="multipart/form-data">
            <div>
                <h5>Form Pendaftaran Relawan TIK Komisariat STMIK Indonesia Padang</h5>
                <b class="text-danger">Isilah data dengan benar !!</b>
            </div>
            <hr class="text border-dark">
            <div>
                @csrf
                <label for="divisi_id">Pilih divisi yang anda inginkan</label>
                <select name="divisi_id" id="divisi_id" class="form-control @error('divisi_id') is-invalid @enderror" required>
                    <option value="">pilih</option>
                    @foreach ($divisi as $row)
                        <option value="{{ $row->id }}">{{ $row->divisi }}</option>
                    @endforeach
                </select>
            </div>
            <hr class="text border-dark">
            <div>
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" required value="{{ old('nama') }}" placeholder="masukan nama ">
            </div>
            @error('nama')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <hr class="text border-dark">
            <div>
                <label for="nim">Nim</label>
                <input type="text" name="nim" id="nim" class="form-control @error('nim') is-invalid @enderror" required value="{{ old('nim') }}" placeholder="masukan nim">
            </div>
            @error('nim')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <hr class="text border-dark">
            <div>
                <label for="nohp">No Hp/ WA</label>
                <input type="text" name="nohp" id="nohp" class="form-control @error('nohp') is-invalid @enderror" required value="{{ old('nohp') }}" placeholder="masukan nomor hp / wa">
            </div>
            @error('nohp')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <hr class="text border-dark">
            <div>
                <label for="agama_id">Agama</label>
                <select name="agama_id" id="agama_id" class="form-control @error('agama_id') is-invalid @enderror" required>
                    <option value="">pilih</option>
                    @foreach ($agama as $row)
                        <option value="{{ $row->id }}">{{ $row->agama }}</option>
                    @endforeach
                </select>
            </div>
            <hr class="text border-dark">
            <div>
                <label for="tempat_lahir">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control @error('tempat_lahir') is-invalid @enderror" required value="{{ old('tempat_lahir') }}">
            </div>
            @error('tempat_lahir')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <hr class="text border-dark">
            <div>
                <label for="tgl_th_lahir">Tanggal / Tahun Lahir</label>
                <input type="date" name="tgl_th_lahir" id="tgl_th_lahir" class="form-control @error('tgl_th_lahir') is-invalid @enderror" required value="{{ old('tgl_th_lahir') }}">
            </div>
            @error('tgl_th_lahir')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="card col-lg-5 p-4 shadow m-2">
            <div>
                <label for="jekel">Jenis Kelamin</label>
                <select name="jekel" id="jekel" class="form-control" required>
                    <option value="">pilih</option>
                    <option value="Pria">Pria</option>
                    <option value="Wanita">Wanita</option>
                </select>
            </div>
            <hr class="text border-dark">
            <div>
                <label for="alamat">Alamat</label>
                <textarea name="alamat" id="alamat" cols="5" rows="5" class="form-control @error('alamat') is-invalid @enderror" required placeholder="masukan alamat">{{ old('alamat') }}</textarea>
            </div>
            @error('alamat')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <hr class="text border-dark">
            <div>
                <label for="tujuan">Tujuan Masuk Organisasi</label>
                <textarea name="tujuan" id="tujuan" cols="5" rows="5" class="form-control @error('tujuan') is-invalid @enderror" required placeholder="masukan tujuan masuk organisasi">{{ old('tujuan') }}</textarea>
            </div>
            @error('tujuan')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <hr class="text border-dark">
            <div>
                <label for="tahun_masuk">Tahun Masuk</label>
                <input type="text" name="tahun_masuk" id="tahun_masuk" class="form-control" value="{{ date('Y') }}" readonly>
            </div>
            <hr class="text border-dark">
            <div>
                <label for="gambar">Foto</label>
                <input type="file" name="gambar" id="gambar" class="form-control @error('gambar') is-invalid @enderror" required value="{{ old('gambar') }}">
            </div>
            @error('gambar')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="d-flex justify-content-end mt-5">
                <button type="submit" class="btn btn-tambah">Daftar</button>
            </div>
        </form>
        </div>
</div>
@endsection
