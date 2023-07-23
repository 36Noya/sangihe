@extends('layouts.report_layout')
@section('main-content')
<div class="judul-post fw-bold d-flex justify-content-center mb-2 fs-4">Update Pengaduan</div>
<form action="{{route('reports.update', $report->id)}}" method="post" enctype="multipart/form-data">
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
        <label for="judul" class="col-md-4 col-form-label  ">Judul</label>

        <div class="col-md-12">
            <input id="judul" type="text" class="form-control @error('judul') is-invalid @enderror" name="judul"
                value="{{ $report->judul }}" required autocomplete="judul" readonly>

            @error('judul')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>


    </div>
    <div class="row mb-3">
        <label for="isi" class="col-md-4 col-form-label  ">Isi</label>

        <div class="col-md-12">
            <textarea id="isi" type="isi" class="form-control @error('isi') is-invalid @enderror" name="isi" required
                autocomplete="isi" readonly autofocus>{{ $report->isi }}</textarea>
            @error('isi')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>


    <div class="row mb-3">
        <label for="lokasi" class="col-md-4 col-form-label  ">Lokasi</label>

        <div class="col-md-12">
            <input id="lokasi" type="text" class="form-control @error('lokasi') is-invalid @enderror" name="lokasi"
                value="{{ $report->lokasi }}" required readonly autocomplete="lokasi" autofocus>

            @error('lokasi')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="foto" class="col-md-4 col-form-label  ">Foto</label>

        <div class="col-md-12">
            <img src="{{Storage::url('files/'.$report->foto)}}" alt="">
        </div>
    </div>

    <div class="row mb-3">
        <label for="status" class="col-md-4 col-form-label  ">Status Sekarang</label>

        <div class="col-md-12">
            <input class="form-control type=" text" value="{{$report->status}}" readonly>

        </div>
    </div>
    @if ($report->status != 'selesai')


    <div class="row mb-3">
        <label for="status" class="col-md-4 col-form-label  ">Update</label>

        <div class="col-md-12">
            <select class="form-control" name="status" id="status" @error('nomor_hp') is-invalid @enderror" required>
                <option value="Proses">Proses</option>
                <option value="Selesai">Selesai</option>
            </select>


            @error('status')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    @endif


    @if ($report->status != 'selesai')
    <button class="btn btn-danger custom-btn-primary" type="submit">Submit </button>
    @endif
</form>
@endsection