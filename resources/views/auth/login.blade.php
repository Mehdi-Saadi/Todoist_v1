@extends('layouts.main-auth')

@section('title', 'Log in')

@section('content')
    <div class="col-lg-6">
        <div class="p-2">
            <h1 class="h2 text-gray-900 mb-5">Log in</h1>
            <a class="btn btn-block border" href="#">Continue with <i class="fab fa-google fa-1x"></i></a>
            <hr>
            <form class="user" method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <label class="form-label" for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="off" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label" for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" required autocomplete="current-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-danger btn-block">
                        Log in
                    </button>
                </div>
            </form>
            <div class="small">
                <a class="text-gray-600" href="{{ route('password.request') }}">Forgot your password?</a>
                <hr>
                Don't have an account? <a class="text-gray-600" href="{{ route('register') }}">Sign up</a>
            </div>
        </div>
    </div>
    <div class="col-lg-6 d-none d-lg-block">
        <img src="{{ asset('/assets/img/login-photo.png') }}" class="img-fluid mt-5 pt-5" alt="">
    </div>
@endsection
