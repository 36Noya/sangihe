@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 ">
            <div class="border rounded custom-login">
                {{-- <div class="card-header">{{ __('Login') }}</div> --}}

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
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
                            <h5 class='d-flex justify-content-center'>Masuk</h5>
                        </div>

                        <div class="row mb-3 d-flex justify-content-center">

                            <div class="col-md-8 ">
                                <input placeholder="NIK/Username" id="uid" type="text"
                                    class="form-control @error('uid') is-invalid @enderror" name="uid"
                                    value="{{ old('uid') }}" required autocomplete="uid" autofocus>

                                @error('uid')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 d-flex justify-content-center">


                            <div class="col-md-8">
                                <input placeholder="Password" id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{-- <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{
                                        old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div> --}}

                        <div class="row d-flex justify-content-center">
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-danger custom-btn-primary col-12">
                                    Masuk
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
                                <a class='custom-dark-font text-decoration-none fw-bold m-2'
                                    href="{{route('register')}}">Daftar Akun</a>

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