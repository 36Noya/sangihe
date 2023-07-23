@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class=" border rounded custom-login">


                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
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
                            <h5 class='d-flex justify-content-center'>Daftar Akun</h5>
                        </div>
                        <div class="row mb-3 d-flex justify-content-center">


                            <div class="col-md-8">
                                <input id="uid" type="text"
                                    class="form-control d-flex justify-content-center @error('uid') is-invalid @enderror"
                                    placeholder="NIK" name="uid" value="{{ old('uid') }}" required autocomplete="uid"
                                    autofocus>

                                @error('uid')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 d-flex justify-content-center">


                            <div class="col-md-8">
                                <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror"
                                    placeholder="Nama" name="nama" value="{{ old('nama') }}" required
                                    autocomplete="nama">

                                @error('nama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>



                        {{-- <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address')
                                }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div> --}}

                        <div class="row mb-3 d-flex justify-content-center">


                            <div class="col-md-8">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    placeholder="Kata Sandi" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 d-flex justify-content-center">


                            <div class="col-md-8">
                                <input id="password-confirm" type="password" class="form-control"
                                    placeholder="Konfirmasi Kata Sandi" name="password_confirmation" required
                                    autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-3 d-flex justify-content-center">


                            <div class="col-md-8">
                                <input id="nomor_hp" type="number"
                                    class="form-control @error('nomor_hp') is-invalid @enderror" placeholder="No Telp"
                                    name="nomor_hp" value="{{ old('nomor_hp') }}" required autocomplete="nomor_hp"
                                    autofocus>

                                @error('nomor_hp')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 d-flex justify-content-center">
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-danger custom-btn-primary col-12">
                                    Daftar
                                </button>

                                {{-- @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif --}}
                            </div>
                        </div>

                        <div class="row d-flex justify-content-center">
                            <div class="col-md-8 d-flex justify-content-center">
                                <a class='custom-dark-font text-decoration-none fw-bold m-2'
                                    href="{{route('posts.index')}}">Halaman Utama</a>


                                {{-- @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif --}}
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-8 d-flex justify-content-center">

                                <a class='custom-dark-font text-decoration-none fw-bold m-2'
                                    href="{{route('login')}}">Masuk</a>

                                {{-- @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif --}}
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection