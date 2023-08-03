<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Mehdi Saadi">
    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title'): Todotask</title>

    <link rel="icon" href="{{ asset('/assets/img/icon.png') }}">

    @vite(['resources/js/app.js', 'resources/js/inbox.js'])
    @livewireStyles
</head>
<body id="page-top">
{{-- Page Wrapper --}}
<div id="wrapper">
    {{-- Content Wrapper --}}
    <div id="content-wrapper" class="d-flex flex-column">
        {{-- Main Content --}}
        <div id="content">
            {{-- Topbar --}}
            @include('layouts.topbar')
            {{-- Begin Page Content --}}
            <div class="container">
                <div class="content mx-auto">
                    <audio id="audio">
                        <source src="{{ asset('/assets/sound-effect/sound.mp3') }}" type="audio/mpeg"> Your browser does not support the audio element.
                    </audio>
                    @yield('content')
                </div>
            </div>
        </div>
        {{-- End of Main Content --}}

{{--            <!-- Footer -->--}}
{{--            <!-- End of Footer -->--}}
    </div>
    {{-- End of Content Wrapper --}}
</div>
    {{-- End of Page Wrapper --}}

{{--    <!-- Scroll to Top Button-->--}}
{{--    <a class="scroll-to-top rounded" href="#page-top">--}}
{{--        <i class="fas fa-angle-up"></i>--}}
{{--    </a>--}}

@include('sweetalert::alert')
@livewireScripts

{{-- Bootstrap core JavaScript --}}
<script src="{{ asset('/assets/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

{{-- Core plugin JavaScript --}}
<script src="{{ asset('/assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
</body>
</html>
