@extends('dashboard.layouts.mainUser')

@section('content-user')
<div class="row d-lg-flex justify-content-center align-content-center">
    <div class="col-lg-4 card p-5 mt-3 card-login">
        <div class="d-flex justify-content-end ">
            <h2><b>Form Login</b> <i class="fa-solid fa-key text-danger"></i></h2>
        </div>
        <hr>
        <form action="/login" method="post">
            @csrf
            <div class="mt-3">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="masukan email anda">
            </div>
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="mt-2">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="masukan password anda">
            </div>
            @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <hr>
            <div class="mt-4 d-flex justify-content-end">
                <button type="submit" class="btn btn-tambah">login</button>
            </div>
        </form>
    </div>
</div>
@endsection
