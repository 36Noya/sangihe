@extends('layouts.tentang_sangihe')
@section('main-content')

<form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
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
    <input type="hidden" name="id_submenu" value="{{request()->segment(3)}}">

    <div class="row mb-3">
        <label for="judul" class="col-md-1 col-form-label ">Judul</label>

        <div class="col-md-12">
            <input id="judul" type="text" class="form-control @error('judul') is-invalid @enderror" name="judul"
                value="{{ old('judul') }}" required autocomplete="judul" autofocus>

            @error('judul')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>


    </div>

    <div class="row mb-3">
        <label for="isi" class="col-md-1 col-form-label ">Isi</label>

        <div class="col-md-12">
            <textarea id="isi" type="text" class="form-control @error('isi') is-invalid @enderror" name="isi" required
                autocomplete="isi">
                {{ old('isi') }}
                    </textarea>
            @error('isi')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>




    <div class="row mb-3">
        <label for="file" class="col-md-1 col-form-label ">File</label>

        <div class="col-md-12">
            <input id="file" type="file" class="form-control @error('file') is-invalid @enderror" name="file"
                value="{{ old('file') }}" required autocomplete="file" autofocus>

            @error('file')
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

<script>
    CKEDITOR.replace( 'isi', {
            filebrowserUploadUrl:"{{route('ckeditor.upload',['_token'=>csrf_token()])}}",
            filebrowserUploadMethod:"form",
        });
</script>
@endsection