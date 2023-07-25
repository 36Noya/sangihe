@extends('layouts.tentang_sangihe')
@section('main-content')
@foreach ($submenus as $submenu)
@if (request()->segment(3) == $submenu->id)
<div class="judul-post fw-bold d-flex justify-content-center mb-2 fs-4">
    {{$submenu->nama}}
</div>
@endif
@endforeach

@if (request()->segment(3) != 10)
<div class="d-flex row">
    <div class="post flex-wrap">
        <div class="row justify-content-center">
            @foreach ($posts as $post)
            <div class="col-md-4 p-2">

                <div class="border">

                    <img src="{{url('storage/files/'.$post->file)}}" class="card-img-top img-fluid" alt="...">

                    <div class="card-body row ">
                        <h6 class="card-title text-center ">{{$post->judul}}</h5>
                            <a href="{{route('posts.show', $post->id)}}"
                                class="btn btn-danger custom-btn-primary">Lihat</a>
                            @if (Auth::check() && Auth::user()->jenis_user === 'admin')
                            <a href="{{route('posts.edit', $post->id)}}"
                                class="btn btn-warning text-light mt-1">Edit</a>

                            <form class="p-0" action="{{route('posts.destroy', $post->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <button class=" btn btn-secondary mt-1 col-md-12" type="submit">Delete</button>
                            </form>
                            @endif
                    </div>
                </div>
            </div>

            @endforeach
        </div>
    </div>
</div>

@else
@foreach ($posts as $post)

<div class="row">
    <div class="col-md-12 ms-3 bg-light border p-2">
        <div class="row ">
            <div class="col-md-2 ">
                <img class="img-fluid" src="{{URL::to('assets/img/pdf-icon.svg')}}" alt="">
            </div>
            <div class="col-md-9">

                <div class="row ">
                    <div class="col-md-4 fw-bold">

                        {{$post->judul}}
                    </div>
                </div>
                <div class="row ">
                    <div class="col-md-4">

                        {!!$post->isi!!}
                    </div>
                </div>
                <div class="row ">
                    <div class="col-md-4 mt-2">

                        <a class="btn btn-danger custom-btn-primary" href="{{Storage::url('files/'.$post->file)}}"
                            download>Download</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endforeach

@endif
{{$posts->links('pagination::bootstrap-5')}}
</div>

@endsection