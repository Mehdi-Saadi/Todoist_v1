@extends('layouts.main-auth')

@section('title', "Reset password")

@section('content')
    <div class="col-lg-6">
        <div class="p-2">
            <h1 class="h2 text-gray-900 mb-5">Reset password</h1>
            <form class="user" method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-group">
                    <label class="form-label" for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ $email ?? old('email') }}" required autocomplete="off">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label" for="password">New password</label>
                    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" required autocomplete="new-password" autofocus>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-danger btn-block">
                        Reset my password
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-lg-6 d-none d-lg-block">
        <img src="{{ asset('/assets/img/forgot-photo.png') }}" style="height: 400px; width: 400px" class="img-fluid ml-5" alt="">
    </div>
@endsection
