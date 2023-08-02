@extends('layouts.app')

@section('title', 'Filters & Labels')

@section('content')
    <!-- Page Heading -->
    <nav class="navbar navbar-expand  topbar mt-5 fixed-heading bg-light border-bottom">

        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <h1 class="h5 mb-0 text-gray-800 font-weight-bolder">Filters & Labels</h1>
            </li>
        </ul>

    </nav>
    <!-- end page heading -->

    <!-- new label form -->
    @include('layouts.label-form')
    <!-- end label task form -->

    <!-- show all labels -->
    <div style="margin-top: 8rem" id="labels" class="list-group col">

        @foreach($labels as $label)
            <div data-sortable-id="{{ $label->id }}" class="list-group-item"><i class="fa-solid fa-tag" style="color:{{ $label->color }}"></i>{{ $label->name }}</div>
        @endforeach

    </div>
    <!-- end show all labels -->

    <!-- new task button -->
    <div class="d-flex justify-content-center mt-2 mb-5">
        <button class="w-100 d-flex justify-content-start border-0 px-2 btn" onclick="showForm('taskForm')"><span><i class="fa-solid fa-plus mr-2 rounded-circle p-1"></i>Add label</span></button>
    </div>

    <!-- Content Row -->
    {{--                    <div class="row">--}}

    {{--                    </div>--}}
@endsection

@section('script')
    <!-- set color value on click -->
    <script src="/assets/js/selectColor.js"></script>

    <!-- sortable scripts -->
    <script src="/assets/js/labelSort.js"></script>
@endsection
