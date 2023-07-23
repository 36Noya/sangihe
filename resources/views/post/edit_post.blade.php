@extends('layouts.tentang_sangihe')
@section('main-content')

<center>
    <h5 class="justify-content-center">Edit Post</h5>
</center>
<form action="{{route('posts.update', $post->id)}}" method="post" enctype="multipart/form-data">
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

    <div class="row mb-3 ">
        <label for="judul" class="col-md-1 col-form-label form-label">Judul</label>

        <div class="col-md-12">
            <input id="judul" type="text" class="form-control @error('judul') is-invalid @enderror" name="judul"
                value="{{$post->judul}}" {{($post->type === 'single post') ? ' readonly' : '' }} autocomplete="judul"
            autofocus>

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
                    {!! $post->isi !!}
                </textarea>
            @error('isi')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    @if ($post->submenu->type == 'multiple posts')

    <div class="row mb-3">
        <label for="file" class="col-md-4 col-form-label ">File</label>
        @if ($post->id_submenu === 10)
        <a href="{{Storage::url('files/'.$post->file)}}" download>{{$post->file}}</a>
        @elseif ($post->submenu->type === 'multiple posts')
        <img class="mb-2" src="{{Storage::url('files/'.$post->file)}}" alt="">
        @endif

        <div class="col-md-6">
            <input id="file" type="file" class="form-control @error('file') is-invalid @enderror" name="file"
                value="{{$post->file}}" autocomplete="file" autofocus>

            @error('file')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    @endif

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