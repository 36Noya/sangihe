@extends('layouts.main')
@section('content')

<div class="container-fluid bg-gradient-custom  ">
    {{-- <a href="{{route('home')}}">Home</a> --}}
    <div class="d-flex justify-content-center">
        <div class="d-flex w-100 h-75 p-5 m-4 custom-container row">
            <div class=" col-md-3 col-sm-12 mb-1">
                <div class="row sub-menu">
                    <div class="p-3">
                        {{-- Menu --}}

                        <div class="p-1">
                            <a class="fw-bold {{(request()->segment(3) != 'edit') ? 'submenu-font-selected' : 'submenu-font'}}"
                                href="{{route('users.show', Auth::id())}}">Profile</a>
                        </div>
                        <div class="p-1">
                            <a class="fw-bold {{(request()->segment(3) == 'edit') ? 'submenu-font-selected' : 'submenu-font'}}"
                                href="{{(route('users.edit', Auth::id()))}}">Ubah Profile</a>
                        </div>


                    </div>
                </div>

            </div>
            <div class="main-content col-md-9">
                @yield('main-content')
            </div>

        </div>
    </div>
</div>

@endsection