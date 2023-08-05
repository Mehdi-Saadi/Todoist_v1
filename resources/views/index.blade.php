<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Mehdi Saadi">
    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Todotask</title>

    <link rel="icon" href="{{ asset('/assets/img/icon.png') }}">

    @vite('resources/js/index.js')
</head>
<body id="page-top" class="bg-white">
{{-- Page Wrapper --}}
<div id="wrapper">
    {{-- Content Wrapper --}}
    <div id="content-wrapper" class="d-flex flex-column">
        {{-- Main Content --}}
        <div id="content">
            {{-- Topbar --}}
            <nav class="navbar navbar-expand navbar-light topbar mb-4 fixed-top">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link text-danger h4" href="/">
                            <i class="fa-solid fa-layer-group mr-2"></i>
                            <b>Todotask</b>
                        </a>
                    </li>
                </ul>

                {{-- Topbar Navbar --}}
                <ul class="navbar-nav ml-auto">


                    <li class="topbar-divider d-none d-sm-block"></li>

                    <li class="nav-item d-flex align-items-center">
                        <a class="nav-link d-flex btn btn-sm mr-3 text-dark" href="{{ route('login') }}" style="max-height: 40px;">
                            Login
                        </a>
                    </li>
                </ul>
            </nav>
            {{-- End of Topbar --}}
            {{-- Page Content --}}
            <div class="container">
                <div class="content mx-auto">
                    @yield('content')
                </div>
            </div>
        </div>
        {{-- End of Main Content --}}

        {{-- Footer --}}
        {{-- End of Footer --}}
    </div>
    {{-- End of Content Wrapper --}}
</div>
{{-- End of Page Wrapper --}}
{{-- Bootstrap core JavaScript --}}
<script src="{{ asset('/assets/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
{{-- Core plugin JavaScript --}}
<script src="{{ asset('/assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
</body>
</html>
