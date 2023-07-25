@extends('layouts.user_layout')
@section('main-content')
<div class="judul-post fw-bold d-flex justify-content-center mb-2 fs-4">Ubah Profile</div>
@if ($message = Session::get('success'))
<div class="alert alert-info" role="alert">
    {{$message}}
</div>
@endif
<form action="{{route('users.update', $user->id)}}" method="post">
    @csrf
    @method('PATCH')
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="row mb-3">
        <label for="uid" class="col-md-4 col-form-label text-md-end">UID</label>

        <div class="col-md-6">
            <input id="uid" type="text" disabled class="form-control @error('uid') is-invalid @enderror" name="uid"
                value="{{$user->uid}}" autocomplete="uid" autofocus>

            @error('uid')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>


    </div>
    <div class="row mb-3">
        <label for="uid" class="col-md-4 col-form-label text-md-end">Nama</label>

        <div class="col-md-6">
            <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                value="{{$user->nama}}" required autocomplete="nama" autofocus>

            @error('nama')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="row mb-3">
        <label for="uid" class="col-md-4 col-form-label text-md-end">Password</label>

        <div class="col-md-6">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                name="password" value="" required autocomplete="new-password" autofocus>

            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="uid" class="col-md-4 col-form-label text-md-end">Konfirmasi Password</label>

        <div class="col-md-6">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                autocomplete="new-password">

        </div>
    </div>


    <div class="row mb-3">
        <label for="uid" class="col-md-4 col-form-label text-md-end">Nomor HP</label>

        <div class="col-md-6">
            <input id="nomor_hp" type="text" class="form-control @error('nomor_hp') is-invalid @enderror"
                name="nomor_hp" value="{{$user->nomor_hp}}" required autocomplete="nomor_hp" autofocus>

            @error('nomor_hp')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>


    <button class="btn btn-danger custom-btn-primary col-md-12" type="submit">Ubah </button>
</form>
@endsection