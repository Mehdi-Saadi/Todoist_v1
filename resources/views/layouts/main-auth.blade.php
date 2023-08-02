<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Mehdi Saadi">

    <title>@yield('title')</title>

    @vite('resources/js/auth.js')
</head>
<body class="bg-white">

<div class="container">
    {{-- Outer Row --}}
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9 p-0">
            <div class="card o-hidden border-0 my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row pl-1">
                        <a class="nav-link h2 text-danger" href="/">
                            <i class="fa-solid fa-layer-group mr-2"></i>
                            Todoist
                        </a>
                    </div>
                    <div class="row">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript -->
<script src="{{ asset('/assets/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('/assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

@include('sweetalert::alert')

</body>
</html>
