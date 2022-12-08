@extends('dashboard.layouts.main')

@section('content')
<div class="row card bg-white shadow p-3 mb-3">
    <h3>Laporan Data Pendaftar RTIK Komsat STMIK Indonesia Padang</h3>
</div>

<div class="row">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-header">
                <h6>Data Pendaftar</h6>
            </div>
            <div class="table-responsive">
                <div class="card-body">
                    <table class="table table-bordered table-hover" id="dataTable">
                        <thead>
                            <tr>
                                <th colspan="12">
                                    <div>
                                        <b>Cetak pendaftar bersarkan tahun masuk</b>
                                        <ul>
                                            @foreach ($tahun as $row)

                                            <li>
                                                <a href="/dashboard/anggota/laporan/pendaftar/cetak/{{ $row->tahun_masuk }}" target="_blank" class="text-link">{{ $row->tahun_masuk }}</a>
                                            </li>

                                        @endforeach
                                        </ul>

                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">NIM</th>
                                <th class="text-center">No Hp</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Divisi yang diinginkan</th>
                                <th class="text-center">Tempat Lahir</th>
                                <th class="text-center">Tanggal Tahun Lahir</th>
                                <th class="text-center">Jenis Kelamin</th>
                                <th class="text-center">Agama</th>
                                <th class="text-center">Alamat</th>
                                <th class="text-center">Tahun masuk</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pendaftar as $row)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $row->nim }}</td>
                                <td>{{ $row->nohp }}</td>
                                <td>{{ $row->nama }}</td>
                                <td>{{ $row->divisi->divisi }}</td>
                                <td>{{ $row->tempat_lahir }}</td>
                                <td>{{ $row->tgl_th_lahir }}</td>
                                <td>{{ $row->jekel }}</td>
                                <td>{{ $row->agama->agama }}</td>
                                <td>{{ $row->alamat }}</td>
                                <td>{{ $row->tahun_masuk }}</td>
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
