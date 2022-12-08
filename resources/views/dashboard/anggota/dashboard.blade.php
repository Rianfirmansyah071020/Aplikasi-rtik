@extends('dashboard.layouts.main')

@section('content')
    <div class="row d-lg-flex justify-content-lg-left align-items-lg-left m-1 p-4">
        <div class="card col-lg-3 col-xl-3 m-3 p-4 shadow card-dashboard">
            <div class="d-flex justify-content-end">
                <h2><i class="fa-solid fa-users"></i></h2>
            </div>
            <h6>Jumlah Anggota Relawan TIK</h6>
            <h6>{{ $anggota }}</h6>
        </div>

        <div class="card col-lg-3 col-xl-3 m-3 p-4 shadow card-dashboard">
            <div class="d-flex justify-content-end">
                <h2><i class="fa-solid fa-users"></i></h2>
            </div>
            <h6>Jumlah Pendaftar Relawan TIK</h6>
            <h6>{{ $pendaftar }}</h6>
        </div>

        <div class="card col-lg-3 col-xl-3 m-3 p-4 shadow card-dashboard">
            <div class="d-flex justify-content-end">
                <h2><i class="fa-solid fa-file-lines"></i></h2>
            </div>
            <h6>Jumlah Artikel Relawan TIK</h6>
            <h6>{{ $artikel }}</h6>
        </div>
    </div>
@endsection
