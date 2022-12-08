@extends('dashboard.layouts.main')

@section('content')
<div class="row card bg-white shadow p-3 mb-3">
    <h3>Laporan Data Anggota RTIK Komsat STMIK Indonesia Padang</h3>
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
                                <th colspan="10">
                                    <div>
                                        <b>Cetak anggota bersarkan</b>
                                        <ul>
                                            @foreach ($status as $row)

                                            <li>
                                                <a href="/dashboard/anggota/laporan/anggota/cetak/{{ $row->id }}" class="text-link" target="_blank">{{ $row->status }}</a>
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
                                <th class="text-center">Status</th>
                                <th class="text-center">Divisi</th>
                                <th class="text-center">Angkatan</th>
                                <th class="text-center">Alamat</th>
                                <th class="text-center">Tahun Masuk</th>
                                <th class="text-center">Tahun Selesai</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($anggota as $row)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $row->nim }}</td>
                                <td>{{ $row->nohp }}</td>
                                <td>{{ $row->nama }}</td>
                                <td>{{ $row->status->status }}</td>
                                <td>{{ $row->divisi->divisi }}</td>
                                <td>{{ $row->angkatan->angkatan }}</td>
                                <td>{{ $row->alamat }}</td>
                                <td>{{ $row->tahun_masuk }}</td>
                                <td>{{ $row->tahun_selesai }}</td>
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
