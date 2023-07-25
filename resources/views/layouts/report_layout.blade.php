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
                        @if (Auth::check() && Auth::user()->jenis_user === 'user' )
                        <div class="p-1">
                            <a class="custom-submenu-a fw-bold {{(request()->segment(2) == 'create') ? 'submenu-font-selected' : 'submenu-font'}}"
                                href="{{route('reports.create')}}">Ajukan Pengaduan</a>
                        </div>
                        @endif
                        <div class="p-1">
                            <a class="custom-submenu-a fw-bold {{(request()->segment(2) == '') ? 'submenu-font-selected' : 'submenu-font'}}"
                                href="{{(route('reports.index'))}}">Semua Pengaduan</a>
                        </div>
                        @if (Auth::check() && Auth::user()->jenis_user === 'user')
                        <div class="p-1">
                            <a class="custom-submenu-a fw-bold {{(request()->segment(2) == 'showAllReportsByUserId') ? 'submenu-font-selected' : 'submenu-font'}}"
                                href="{{route('reports.show_report_by_user_id')}}">Pengaduan
                                Saya</a>
                        </div>
                        @endif

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