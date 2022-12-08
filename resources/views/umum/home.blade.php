@extends('dashboard.layouts.mainUser')

@section('content-user')
<div class="row card p-2 mt-3 shadow">
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active card-slide">
                <img src="/storage/dokumentasi/{{ $dokumentasi[0]->file }}" class="d-block w-100 img-slide" alt="...">
              </div>
            @foreach ($dokumentasi as $row)
            <div class="carousel-item card-slide">
                <img src="/storage/dokumentasi/{{ $row->file }}" class="d-block w-100 img-slide" alt="...">
              </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
</div>
    <div class="row d-flex justify-content-center">
        @foreach ($konten as $row)
            <div class="card col-12 shadow mt-2 p-5">
                <article>{!! $row->isi !!}</article>
            </div>
        @endforeach
    </div>
@endsection
