@extends('layouts.main')

@section('title', 'Labels')

@push('script')
    @vite('resources/js/labels.js')
@endpush

@section('content')
    {{-- Page Heading --}}
    <nav class="navbar navbar-expand  topbar mt-5 fixed-heading bg-light border-bottom">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <h1 class="h5 mb-0 text-gray-800 font-weight-bolder">Labels</h1>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <button class="btn btn-sm mb-0" onclick="showForm('labelModal')"><i class="fa-solid fa-plus"></i></button>
            </li>
        </ul>
    </nav>
    {{-- end page heading --}}

    {{-- new label form --}}
    @include('layouts.label-form')

    {{-- show all labels --}}
    <div style="margin-top: 8rem" id="labels" class="list-group col pr-0">
        @foreach($labels as $label)
            <div class="list-group-item" style="cursor: pointer" id="{{ $label->id }}">
                <i class="fa-solid fa-tag mr-3" style="color: {{ $label->color }} !important;"></i>{{ $label->name }}
            </div>
        @endforeach
    </div>
    {{-- end show all labels --}}
@endsection
