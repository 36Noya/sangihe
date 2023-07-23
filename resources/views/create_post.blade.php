@extends('layouts.report_layout')
@section('content')
<form action="">
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
        <label for="judul" class="col-md-4 col-form-label text-md-end">{{ __('Judul') }}</label>

        <div class="col-md-6">
            <input id="judul" type="text" class="form-control @error('judul') is-invalid @enderror" name="judul"
                value="{{ old('judul') }}" required autocomplete="judul" autofocus>

            @error('judul')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <label for="isi" class="col-md-4 col-form-label text-md-end">{{ __('Isi') }}</label>
        <div class="col-md-6">

            <textarea name="isi" id="isi">
                </textarea>
        </div>

    </div>
</form>
<script>
    ClassicEditor
        .create( document.querySelector( '#isi' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@endsection