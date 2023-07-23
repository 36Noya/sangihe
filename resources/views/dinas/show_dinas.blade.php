@extends('layouts.tentang_sangihe')
@section('main-content')
<div class="judul-post fw-bold d-flex justify-content-center mb-2 fs-4">Profile</div>
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
        <label for="uid" class="col-md-4 col-form-label ">NIK</label>

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
        <label for="uid" class="col-md-4 col-form-label ">Nama</label>

        <div class="col-md-6">
            <input disabled id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                value="{{$user->nama}}" required autocomplete="nama" autofocus>

            @error('nama')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>



    <div class="row mb-3">
        <label for="uid" class="col-md-4 col-form-label ">Nomor HP</label>

        <div class="col-md-6">
            <input disabled id="nomor_hp" type="text" class="form-control @error('nomor_hp') is-invalid @enderror"
                name="nomor_hp" value="{{$user->nomor_hp}}" required autocomplete="nomor_hp" autofocus>

            @error('nomor_hp')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>


</form>
@endsection