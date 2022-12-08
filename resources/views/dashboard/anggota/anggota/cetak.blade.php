<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Anggota</title>
    <link rel="stylesheet" href="/sass/main.css">
</head>
<body>
    <style>
        .tableCetak {
            width: 100%;
            font-size: 10;
        }
        .tableCetak,tr,th,td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 4px;
        }

        .cops {
            text-align: center;
            color:black;



        }

        .ttd {
            text-align: right;
            margin-top: 30px;
            font-size: 10;
        }

        .nama {
            display: block;
        }

        .ketua {
            display: block;
            margin-right: 65px;
            margin-bottom: 50px;
        }

        .tanggal {
            margin-right: 17px;
            display: block;
        }
        .img {
            width: 80px;
        }
    </style>
<div class="cops">
    <table style="border:none; width:100%;">
        <tr style="border:none;">
            <td style="border:none;">
                <img src="{{ public_path('/storage/organisasi/stmik.jpg') }}" class="img">
            </td>
            <td style="border:none; text-align:center; line-height:.1cm">
                <h4>RELAWAN TIK KOMISARIAT STMIK INDONESIA PADANG</h4>
                <p>Jl. Khatib Sulaiman Dalam No. 1 Padang</p>
                <p>Sekretariat : Kampus STMIK Indonesia Padang</p>
                <p>Email : <span style="color: blue;">rtikkomisariat@gmail.com</span></p>
            </td>
            <td style="border:none;">
                <img src="{{ public_path('/storage/organisasi/rtik-nasional.jpg') }}" class="img">
            </td>
    </table>

</div>
<hr style="border: 2px solid black;">
<h4 style="text-align: center;">Data {{ $status }} Relawan TIK Komisariat STMIK Indonesia Padang</h4>
<div class="container-fluid">
    <table class="tableCetak">
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">NIM</th>
                <th class="text-center">No Hp</th>
                <th class="text-center">Nama</th>
                <th class="text-center">Divisi</th>
                <th class="text-center">Angkatan</th>
                <th class="text-center">Alamat</th>
                <th class="text-center">Tahun Masuk</th>
                <th class="text-center">Tahun Selesai</th>
            </tr>
            @foreach ($anggota as $row)
            <tr>
                <td style="text-align: center;">{{ $loop->iteration }}</td>
                <td>{{ $row->nim }}</td>
                <td>{{ $row->nohp }}</td>
                <td>{{ $row->nama }}</td>
                <td>{{ $row->divisi->divisi }}</td>
                <td>{{ $row->angkatan->angkatan }}</td>
                <td>{{ $row->alamat }}</td>
                <td style="text-align: center;">{{ $row->tahun_masuk }}</td>
                <td style="text-align: center;">{{ $row->tahun_selesai }}</td>
            </tr>
            @endforeach
    </table>
    <div class="ttd">
        <small class="tanggal"><b>Padang, {{ date('d / m / Y') }}</b></small>
        <small class="ketua"><b>Ketua</b></small>

        <small class="nama"><b>(...........................................)</b></small>
    </div>
</div>
</body>
</html>
