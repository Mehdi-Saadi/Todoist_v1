@extends('layouts.main')

@section('content')
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
    @include('layouts.task-form')
    <!-- end new task form -->

    <!-- show all tasks -->
    <div class="mt-4">
        <div id="nestedRoot" class="list-group col nested-sortable pr-0" ondrop="sendRequest(serialize(root))">

            @include('layouts.tasks', ['tasks' => $tasks])

        </div>
    </div>
    <!-- end show all tasks -->

    <!-- new task button -->
    <div class="d-flex justify-content-center mt-3">
        <button class="w-100 d-flex justify-content-start border-0 px-2 btn" onclick="ShowFormAndSetValue(this)" data-id="0" data-archive="0"><span><i class="fa-solid fa-plus mr-2 rounded-circle p-1"></i>Add task</span></button>
    </div>

    <!-- Content Row -->
    {{--                    <div class="row">--}}

    {{--                    </div>--}}
@endsection
