@extends('layouts.tentang_sangihe')
@section('main-content')

{{-- Form Input --}}
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
    <input hidden type="text" name="id_submenu" value="{{$submenu->id}}">
    <div class="row mb-3">
        <label for="judul" class="col-md-4 col-form-label text-md-end">Judul</label>

        <div class="col-md-6">
            <input id="judul" type="text" class="form-control @error('judul') is-invalid @enderror" name="judul"
                value="{{ old('judul') }}" required autocomplete="judul" readonly>

            @error('judul')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>


    </div>

    <div class="row mb-3">
        <label for="isi" class="col-md-4 col-form-label text-md-end">Isi</label>

        <div class="col-md-6">
            <textarea id="isi" type="text" class="form-control @error('isi') is-invalid @enderror" name="isi"
                value="{{ old('isi') }}" required readonly autocomplete="isi">
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
        <label for="file" class="col-md-4 col-form-label text-md-end">File</label>

        <div class="col-md-6">
            <input id="file" type="file" class="form-control @error('file') is-invalid @enderror" name="file"
                value="{{ old('file') }}" autocomplete="file" required autofocus>

            @error('file')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <button type="submit">Submit</button>
</form>

<table>
    <tr>
        <th>Judul</th>
        <th>Isi</th>
        <th>Pembuat</th>
        <th>File</th>
        <th>Action</th>
    </tr>
    @foreach ($posts as $post)
    <tr>
        <td>{{$post->judul}}</td>
        <td>{!!$post->isi!!}</td>
        <td>{{$post->user->nama}}</td>
        <td>
            @if ($post->submenu->id !== 10)
            <img src="{{Storage::url('files/'.$post->file)}}" alt="">
            @else
            <a href="{{Storage::url('files/'.$post->file)}}" download>{{$post->file}}</a>
            @endif
        </td>
        <td>
            <a href="{{route('posts.show', $post->id)}}">Show</a>
            <a href="{{route('posts.edit', $post->id)}}">Edit</a>
            <form action="{{route('posts.destroy', $post->id)}}" method="post">
                @csrf
                @method('delete')
                <button type="submit">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

<script>
    CKEDITOR.replace( 'isi', {
            filebrowserUploadUrl:"{{route('ckeditor.upload',['_token'=>csrf_token()])}}",
            filebrowserUploadMethod:"form",
        });
</script>
@endsection