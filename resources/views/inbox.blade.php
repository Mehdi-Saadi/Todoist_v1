@extends('layouts.main')

@section('title', 'Inbox')

@section('content')
    <!-- Page Heading -->
    <nav class="navbar navbar-expand  topbar mb-4 static-top">

        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <h1 class="h5 mb-0 text-gray-800 font-weight-bolder">Inbox</h1>
            </li>
        </ul>

        <!-- tools -->
        <ul class="navbar-nav ml-auto">

            <!-- Nav Item - view -->
            <li class="nav-item dropdown no-arrow">
                <button type="button" class="btn btn-sm mr-md-2 d-lg-inline text-gray-600 nav-link dropdown-toggle" title="View"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="viewDropdown" data-bs-auto-close="outside">
                    <i class="fas fa-list fa-sm fa-fw"></i>
                </button>
                <!-- Dropdown - view settings -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                     aria-labelledby="viewDropdown">
                    <!-- Heading -->
                    <div class="sidebar-heading text-gray-900 ml-4">View</div>

                    <button type="button" class="btn btn-sm dropdown-item dropdown-toggle" id="layoutDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-md-2 d-lg-inline text-gray-700 small">
                            <i class="fa-regular fa-chart-bar mr-2"></i>
                            Layout
                        </span>
                    </button>
                    <!-- Dropdown - select type of view -->
                    <div class="dropdown-menu dropstart shadow animated--grow-in" aria-labelledby="layoutDropdown">

                        <button type="button" class="btn btn-sm dropdown-item">List</button>
                        <button type="button" class="btn btn-sm dropdown-item">Board</button>

                    </div>

                    <div class="dropdown-divider"></div>

                    <!-- Heading -->
                    <div class="sidebar-heading text-gray-900 ml-4">Sort</div>

                    <button class="btn btn-sm dropdown-item" id="groupDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-md-2 d-lg-inline text-gray-700 small">
                            <i class="fa-regular fa-object-ungroup mr-2"></i>
                            Grouping
                        </span>
                    </button>
                    <!-- Dropdown - select type of view -->
                    <div class="dropdown-menu dropdown-menu-left shadow animated--grow-in" aria-labelledby="groupDropdown">

                        <button type="button" class="btn btn-sm dropdown-item">None (default)</button>
                        <button type="button" class="btn btn-sm dropdown-item">Due date</button>
                        <button type="button" class="btn btn-sm dropdown-item">Date added</button>
                        <button type="button" class="btn btn-sm dropdown-item">Priority</button>
                        <button type="button" class="btn btn-sm dropdown-item">Label</button>

                    </div>

                    <button class="btn btn-sm dropdown-item" id="sortDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-md-2 d-lg-inline text-gray-700 small">
                            <i class="fa-solid fa-arrow-down-short-wide mr-2"></i>
                            Sorting
                        </span>
                    </button>
                    <!-- Dropdown - select type of view -->
                    <div class="dropdown-menu dropdown-menu-left shadow animated--grow-in" aria-labelledby="sortDropdown">

                        <button type="button" class="btn btn-sm dropdown-item">Default</button>
                        <button type="button" class="btn btn-sm dropdown-item">Name</button>
                        <button type="button" class="btn btn-sm dropdown-item">Due date</button>
                        <button type="button" class="btn btn-sm dropdown-item">Date added</button>
                        <button type="button" class="btn btn-sm dropdown-item">Priority</button>

                    </div>

                </div>
            </li>

            <!-- Nav Item - comments -->
            <li class="nav-item" title="Comments">
                <button class="btn btn-sm mr-md-2 d-lg-inline text-gray-600 nav-link"><i class="fa-regular fa-message"></i></button>
            </li>

            <!-- Nav Item - more tools -->
            <li class="nav-item dropdown no-arrow">
                <button type="button" class="btn btn-sm mr-md-2 d-lg-inline text-gray-600 nav-link dropdown-toggle"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="moreTools" title="More actions">
                    <i class="fa-solid fa-ellipsis"></i>
                </button>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="moreTools">
                    <button class="dropdown-item btn btn-sm" type="button">
                        <i class="fa-regular fa-square-plus mr-2 text-gray-700"></i>
                        Add section
                    </button>
                    <div class="dropdown-divider"></div>
                    <button class="dropdown-item btn btn-sm" type="button">
                        <i class="fa-regular fa-circle-check mr-2 text-gray-700"></i>
                        Show completed
                    </button>
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
        <div id="nestedRoot" class="list-group col nested-sortable pr-0">

            @include('layouts.tasks', ['tasks' => $tasks])

        </div>
    </div>
    <!-- end show all tasks -->

    <!-- new task button -->
    <div class="d-flex justify-content-center mt-2 mb-5">
        <button class="w-100 d-flex justify-content-start border-0 px-2 btn" onclick="ShowFormAndSetValue(this)" data-id="0" data-archive="0"><span><i class="fa-solid fa-plus mr-2 rounded-circle p-1"></i>Add task</span></button>
    </div>

    <!-- Content Row -->
    {{--                    <div class="row">--}}

    {{--                    </div>--}}
@endsection
