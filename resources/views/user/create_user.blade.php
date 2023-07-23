@extends('layouts.user_layout')
@section('content')

<a href="{{route('users.index')}}">Index User</a>
<a href="{{route('users.create')}}">Create</a>
<form action="{{route('users.store')}}" method="post">
    @csrf
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
            <input id="uid" type="text" class="form-control @error('uid') is-invalid @enderror" name="uid"
                value="{{ old('uid') }}" required autocomplete="uid" autofocus>

            @error('uid')
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
                name="password" value="{{ old('password') }}" required autocomplete="new-password" autofocus>

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
        <label for="uid" class="col-md-4 col-form-label text-md-end">Nama</label>

        <div class="col-md-6">
            <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                value="{{ old('nama') }}" required autocomplete="nama" autofocus>

            @error('nama')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="uid" class="col-md-4 col-form-label text-md-end">Nomor HP</label>

        <div class="col-md-6">
            <input id="nomor_hp" type="text" class="form-control @error('nomor_hp') is-invalid @enderror"
                name="nomor_hp" value="{{ old('nomor_hp') }}" required autocomplete="nomor_hp" autofocus>

            @error('nomor_hp')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="uid" class="col-md-4 col-form-label text-md-end">Jenis User</label>

        <div class="col-md-6">
            <select name="jenis_user" id="jenis_user" @error('nomor_hp') is-invalid @enderror" required>
                <option value="superadmin">Superadmin</option>
                <option value="admin">Admin</option>
            </select>


            @error('jenis_user')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <button class="btn btn-danger custom-btn-primary" type="submit">Submit </button>
</form>
@endsection