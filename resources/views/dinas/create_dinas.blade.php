@extends('layouts.tentang_sangihe')
@section('main-content')
<div class="judul-post fw-bold d-flex justify-content-center mb-2 fs-4">Buat Dinas</div>

<form action="{{route('dinas.store')}}" method="post" enctype='multipart/form-data'>
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
        <label for="nama" class="col-md-4 col-form-label text-md-end">Nama</label>

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
        <label for="alamat" class="col-md-4 col-form-label text-md-end">Alamat</label>

        <div class="col-md-6">
            <input id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat"
                value="{{ old('alamat') }}" required autocomplete="alamat" autofocus>

            @error('alamat')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="nomor_telepon" class="col-md-4 col-form-label text-md-end">Nomor Telepon</label>

        <div class="col-md-6">
            <input id="nomor_telepon" type="text" class="form-control @error('nomor_telepon') is-invalid @enderror"
                name="nomor_telepon" value="{{ old('nomor_telepon') }}" required autocomplete="nomor_telepon" autofocus>

            @error('nomor_telepon')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="website" class="col-md-4 col-form-label text-md-end">Link Website</label>

        <div class="col-md-6">
            <input id="website" type="text" class="form-control @error('website') is-invalid @enderror" name="website"
                value="{{ old('website') }}" autocomplete="website" autofocus>

            @error('website')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="website" class="col-md-4 col-form-label text-md-end">Logo</label>
        <div class="col-md-6">
            <input id="logo" type="file" class="form-control @error('logo') is-invalid @enderror" name="logo"
                value="{{ old('logo') }}" autocomplete="logo" required autofocus>

            @error('logo')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>


    <button class="btn btn-danger custom-btn-primary col-md-12" type="submit">Submit </button>
</form>
@endsection