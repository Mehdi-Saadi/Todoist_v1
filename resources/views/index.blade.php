<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Mehdi Saadi">

    <title>Inbox</title>

    <!-- Custom fonts for this template-->
    <link href="/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- font awesome -->
    <link href="/assets/fontawesome/css/fontawesome.min.css" rel="stylesheet" type="text/css">
    <link href="/assets/fontawesome/css/solid.min.css" rel="stylesheet" type="text/css">
    <link href="/assets/fontawesome/css/regular.min.css" rel="stylesheet" type="text/css">

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/assets/css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        /* add task button styles */
        button.w-100 > span > i {
            color: #d9534f;
        }
        button.w-100:hover {
            color: #d9534f;
        }
        button.w-100:hover > span > i {
            background: #d9534f;
            color: #fff;
        }
        /* end add task button styles */

        /* new task form styles */
        /* The Modal (background) */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            left: 0;
            top: 0;
            max-width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
            padding-top: 60px;
        }
        /* Modal Content/Box */
        .modal-content {
            background-color: #fefefe;
            margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
            border: 1px solid #888;
            max-width: 600px; /* Could be more or less, depending on screen size */
        }
        /* Add Zoom Animation */
        .animate {
            -webkit-animation: animatezoom 0.6s;
            animation: animatezoom 0.6s
        }
        @-webkit-keyframes animatezoom {
            from {-webkit-transform: scale(0)}
            to {-webkit-transform: scale(1)}
        }
        @keyframes animatezoom {
            from {transform: scale(0)}
            to {transform: scale(1)}
        }
        /* end new task form styles */
    </style>
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
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <h1 class="h3 mb-0 text-gray-800">Inbox</h1>
                            </li>
                        </ul>

                        <!-- tools -->
                        <ul class="navbar-nav ml-auto">

                            <!-- Nav Item - view -->
                            <li class="nav-item dropdown no-arrow" title="View">
                                <a class="nav-link dropdown-toggle" href="#" id="viewDropdown" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-md-2 d-lg-inline text-gray-600 small"><i class="fas fa-list fa-sm fa-fw"></i></span>
                                </a>
                                <!-- Dropdown - view settings -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                     aria-labelledby="viewDropdown">
                                    <!-- Heading -->
                                    <div class="sidebar-heading text-gray-900 ml-4">View</div>

                                    <a class="dropdown-item" href="#" id="layoutDropdown" role="button"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-md-2 d-lg-inline text-gray-700 small">
                                        <i class="fa-regular fa-chart-bar mr-2"></i>
                                        Layout
                                    </span>
                                    </a>
                                    <!-- Dropdown - select type of view -->
                                    <div class="dropdown-menu dropstart shadow animated--grow-in"
                                         aria-labelledby="layoutDropdown">

                                        <a class="dropdown-item" href="#">
                                            List
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            Board
                                        </a>

                                    </div>

                                    <div class="dropdown-divider"></div>

                                    <!-- Heading -->
                                    <div class="sidebar-heading text-gray-900 ml-4">Sort</div>

                                    <a class="dropdown-item" href="#" id="sortrDropdown" role="button"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="mr-md-2 d-lg-inline text-gray-700 small">
                                            <i class="fa-regular fa-object-ungroup mr-2"></i>
                                            Grouping
                                        </span>
                                    </a>
                                    <!-- Dropdown - select type of view -->
                                    <div class="dropdown-menu dropdown-menu-left shadow animated--grow-in"
                                         aria-labelledby="sortrDropdown">

                                        <a class="dropdown-item" href="#">
                                            None (default)
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            Due date
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            Date added
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            Priority
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            Label
                                        </a>

                                    </div>

                                    <a class="dropdown-item" href="#" id="userDropdown" role="button"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="mr-md-2 d-lg-inline text-gray-700 small">
                                            <i class="fa-solid fa-arrow-down-short-wide mr-2"></i>
                                            Sorting
                                        </span>
                                    </a>
                                    <!-- Dropdown - select type of view -->
                                    <div class="dropdown-menu dropdown-menu-left shadow animated--grow-in"
                                         aria-labelledby="userDropdown">

                                        <a class="dropdown-item" href="#">
                                            Default
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            Name
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            Due date
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            Date added
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            Priority
                                        </a>

                                    </div>

                                </div>
                            </li>

                            <!-- Nav Item - comments -->
                            <li class="nav-item" title="Comments">
                                <button class="btn btn-sm mr-md-2 d-lg-inline text-gray-600 nav-link"><i class="fa-regular fa-message"></i></button>
                            </li>

                            <!-- Nav Item - more tools -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-md-2 d-lg-inline text-gray-600 small"><i class="fa-solid fa-ellipsis"></i></span>
                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                     aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Profile
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Settings
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Activity Log
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Logout
                                    </a>
                                </div>
                            </li>

                        </ul>

                    </nav>
                    <!-- end page heading -->

                    <!-- new task form -->
                    <div id="id01" class="modal">
                        <form class="modal-content animate p-4" action="/action_page.php" method="post">
                            @csrf
                            <input type="hidden" name="parent_id" id="parent_id" value="">
                            <div class="form-group">
                                <input type="text" class="form-control my-2" placeholder="Task name" name="task" required autocomplete="off">
                                <input type="text" class="form-control my-2" placeholder="Description" name="description" autocomplete="off">
                            </div>
                            <div class="form-group mb-0">
                                <button type="submit" class="btn btn-danger btn-sm float-right ml-2">Add task</button>
                                <button type="button" class="btn btn-sm float-right" onclick="document.getElementById('id01').style.display='none'">Cancel</button>
                            </div>
                        </form>
                    </div>
                    <!-- end new task form -->

                    <!-- new task button -->
                    <div class="d-flex justify-content-center">
                        <button class="w-100 d-flex justify-content-start border-0 px-2 btn" onclick="ShowFormAndSetValueOfParentId(this)" data-id="0"><span><i class="fa-solid fa-plus mr-2 rounded-circle p-1"></i>Add task</span></button>
                    </div>

                    <!-- Content Row -->
{{--                    <div class="row">--}}

{{--                    </div>--}}

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="/assets/vendor/jquery/jquery.min.js"></script>
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/assets/js/sb-admin-2.min.js"></script>

    <!-- new task form scripts -->
    <script>
        // Get the modal
        var modal = document.getElementById('id01');

        // When the user clicks anywhere outside the modal, close it
        window.onclick = function(event) {
            if (event.target === modal) {
                modal.style.display = "none";
            }
        }

        // show the send comment form and set the value of parent id
        function ShowFormAndSetValueOfParentId(button) {
            document.getElementById('id01').style.display='block';
            let parent_id = document.getElementById('parent_id');
            parent_id.value = $(button).data('id'); // set the parent id of given comment
        }
    </script>
    <!-- end new task form scripts -->

</body>
</html>
