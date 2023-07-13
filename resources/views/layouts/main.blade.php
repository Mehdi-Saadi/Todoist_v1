<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Mehdi Saadi">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- font awesome -->
    <link href="/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="/assets/fontawesome/css/fontawesome.min.css" rel="stylesheet" type="text/css">
    <link href="/assets/fontawesome/css/solid.min.css" rel="stylesheet" type="text/css">
    <link href="/assets/fontawesome/css/regular.min.css" rel="stylesheet" type="text/css">

{{--    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">--}}

    <!-- Custom styles for this template-->
    <link href="/assets/css/sb-admin-2.min.css" rel="stylesheet">
    <!-- custom styles -->
    <link href="/assets/css/style.css" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('layouts.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('layouts.topbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container">

                    <div class="content mx-auto">
                        <audio id="audio">
                            <source src="./assets/sound-effect/sound.mp3" type="audio/mpeg"> Your browser does not support the audio element.
                        </audio>
                        @yield('content')
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- sortablejs library -->
    <script src="/assets/js/sortablejs/Sortable.min.js"></script>

    <!-- send request -->
    <script src="/assets/js/sendRequest.js"></script>

    <!-- Bootstrap core JavaScript-->
    <script src="/assets/vendor/jquery/jquery.min.js"></script>
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/assets/js/sb-admin-2.min.js"></script>

    <!-- task form scripts -->
    <script src="/assets/js/taskForm.js"></script>
    <script src="/assets/js/doneCircleEffect.js"></script>

    <!-- sweetalert -->
    @include('sweetalert::alert')

    <!-- sortable scripts -->
    <script src="/assets/js/sortScript.js"></script>
</body>
</html>
