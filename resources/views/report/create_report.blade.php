@extends('layouts.report_layout')
@section('main-content')
<div class="judul-post fw-bold d-flex justify-content-center mb-2 fs-4">Buat Pengaduan</div>
@if (Auth::check())
<form action="{{route('reports.store')}}" method="post" enctype="multipart/form-data">
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



        <div class="col-md-12">
            <input placeholder="Judul Pengaduan" id="judul" type="text"
                class="form-control @error('judul') is-invalid @enderror" name="judul" value="{{ old('judul') }}"
                required autocomplete="judul" autofocus>

            @error('judul')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>


    </div>
    <div class="row mb-3">

        <div class="col-md-12">
            <textarea placeholder="Isi" id="isi" type="isi" class="form-control @error('isi') is-invalid @enderror"
                name="isi" value="{{ old('isi') }}" required autocomplete="isi" autofocus></textarea>
            @error('isi')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>


    <div class="row mb-3">

        <div class="col-md-12">
            <input placeholder="Lokasi" id="lokasi" type="text"
                class="form-control @error('lokasi') is-invalid @enderror" name="lokasi" value="{{ old('lokasi') }}"
                required autocomplete="lokasi" autofocus>

            @error('lokasi')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">

        <div class="col-md-12">
            <input placeholder="Tanggal Kejadian" id="tgl_kejadian"
                class="form-control @error('tgl_kejadian') is-invalid @enderror" name="tgl_kejadian" required
                autocomplete="tgl_kejadian" type="text" onfocus="(this.type='date')" onblur="(this.type='text')">

            @error('tgl_kejadian')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">

        <div class="col-md-12">
            <input id="foto" type="file" class="form-control @error('foto') is-invalid @enderror" name="foto"
                value="{{ old('foto') }}" autocomplete="foto" required autofocus>

            @error('foto')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>


    <div class="row mb-3">
        <button class="btn btn-danger custom-btn-primary" type="submit">Submit </button>
    </div>
</form>
@else
<div class="judul-post fw-bold d-flex justify-content-center mb-2 fs-5 alert alert-danger">Silahkan login sebelum
    membuat
    pengaduan</div>
@endif
@endsection