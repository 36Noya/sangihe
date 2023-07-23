@extends('layouts.main')
@section('content')
<div class="container-fluid bg-gradient-custom  ">
    {{-- <a href="{{route('home')}}">Home</a> --}}
    <div class="d-flex justify-content-center">
        <div class="d-flex w-75 h-75 p-5 m-4 custom-container row">
            <div class=" col-md-3 col-sm-12 mb-1">
                <div class="row sub-menu">
                    <div class="p-3">

                        @foreach($submenus as $submenu)
                        @if ($menu === 'tentang' AND $submenu->menu === 'tentang sangihe')
                        <div class="p-1">
                            @if ($submenu->id === 14)
                            <a class="fw-bold {{(request()->segment(1) == 'dinas') ? 'submenu-font-selected' : 'submenu-font'}}"
                                href="{{route('dinas.index')}}">{{$submenu->nama}}</a>
                            @else
                            @if ($submenu->type === 'single post')

                            <a class="fw-bold {{(request()->segment(3) == $submenu->id) ? 'submenu-font-selected' : 'submenu-font'}}"
                                href="{{route('posts.show_single_post', $submenu->id)}}">{{$submenu->nama}}</a>
                            @else
                            <a class=" fw-bold {{(request()->segment(3) == $submenu->id) ? 'submenu-font-selected' : 'submenu-font'}}"
                                href="{{route('posts.filter_post_by_submenu', $submenu->id)}}">{{$submenu->nama}}</a>
                            @endif
                            @endif

                        </div>
                        @elseif($menu === 'layanan' AND $submenu->menu === 'layanan dan informasi publik')
                        <div class="p-1">
                            @if ($submenu->type === 'single post')

                            <a class="fw-bold {{(request()->segment(3) == $submenu->id) ? 'submenu-font-selected' : 'submenu-font'}}"
                                href="{{route('posts.show_single_post', $submenu->id)}}">{{$submenu->nama}}</a>
                            @else
                            <a class=" fw-bold {{(request()->segment(3) == $submenu->id) ? 'submenu-font-selected' : 'submenu-font'}}"
                                href="{{route('posts.filter_post_by_submenu', $submenu->id)}}">{{$submenu->nama}}</a>
                            @endif
                        </div>
                        @endif
                        @endforeach

                    </div>
                </div>
                @if (Auth::check() && Auth::user()->jenis_user === 'admin')

                <div class="row sub-menu">
                    <div class="col-md-12">
                        <div class="p3">
                            <div class="p-1">
                                @foreach ($submenus as $submenu)
                                @if (request()->segment(3) == $submenu->id)

                                @if ($submenu->type === 'single post' && $submenu->id != '13')
                                <a class="fw-bold submenu-font"
                                    href="{{route('posts.edit_single_post', $submenu->id)}}">Edit</a>
                                @elseif($submenu->type === 'multiple posts')
                                <a class="fw-bold submenu-font"
                                    href="{{route('posts.create', $submenu->id)}}">Create</a>
                                @endif
                                @endif
                                @endforeach

                                @if (request()->segment(1) == 'dinas')
                                <a class="fw-bold submenu-font" href="{{route('dinas.create')}}">Create</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
            <div class="main-content col-md-9">
                @yield('main-content')
            </div>

        </div>
    </div>
</div>

@endsection