@extends('layouts.main-auth')

@section('title', "Can't sign in?")

@section('content')
    @if (session('status'))
        @php
        toast(session('status'), 'success')
        @endphp
    @endif
    <div class="col-lg-6">
        <div class="p-2">
            <h1 class="h2 text-gray-900 mb-5">Forgot your password?</h1>
            <p>
                To reset your password, please enter the email address of your Todoist account.
            </p>
            <form class="user" method="POST" action="{{ route('password.email') }}">
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
                    <button type="submit" class="btn btn-danger btn-block">
                        Reset my password
                    </button>
                </div>
                <div class="small text-center">
                    <hr>
                    <a class="text-gray-600" href="{{ route('login') }}">Go to login</a>
                </div>
            </form>
        </div>
    </div>
    <div class="col-lg-6 d-none d-lg-block">
        <img src="/assets/img/forgot-photo.png" class="img-fluid mt-5 pt-3" alt="">
    </div>
@endsection
