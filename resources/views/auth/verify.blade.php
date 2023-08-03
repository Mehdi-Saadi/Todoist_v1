@extends('layouts.main-auth')

@section('title', "Verify email")

@section('content')
    @if (session('resent'))
        @php
            toast('We sent a fresh verification link.', 'success')
        @endphp
    @endif
    <div class="col-lg-6">
        <div class="p-2">
            <h1 class="h2 text-gray-900 my-5">Verify your email!</h1>
            Before proceeding, please check your email for a verification link.
            If you did not receive the email
            <form class="user d-inline" method="POST" action="{{ route('verification.resend') }}">
                @csrf
                <button type="submit" class="btn btn-link p-0 m-0 align-baseline">click here to request another</button>
            </form>
        </div>
    </div>
    <div class="col-lg-6 d-none d-lg-block">
        <img src="{{ asset('/assets/img/forgot-photo.png') }}" style="height: 400px; width: 400px" class="img-fluid ml-5" alt="">
    </div>
@endsection
