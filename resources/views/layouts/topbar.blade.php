<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 shadow fixed-top" style="max-height: 50px">
    <ul class="navbar-nav">
        <li class="nav-item dropdown no-arrow d-flex justify-content-center align-items-center">
            <button type="button" class="nav-link dropdown-toggle d-flex justify-content-center btn btn-sm btn-link rounded-2 mr-1"
                    style="max-height: 50px" id="menu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-bars text-danger"></i>
            </button>
            {{-- Dropdown - menu --}}
            <div class="dropdown-menu dropdown-menu-left shadow animated--grow-in" aria-labelledby="menu" style="max-width: 400px; min-width: 250px">
                <a class="dropdown-item btn btn-sm" href="{{ route('app') }}">
                    <i class="fa-solid fa-inbox mr-2 text-primary"></i>
                    <span>Inbox</span>
                </a>
                <a class="dropdown-item btn btn-sm" href="{{ route('labels') }}">
                    <i class="fa-solid fa-table-cells-large mr-2 text-warning"></i>
                    <span>Labels</span>
                </a>
{{--                <a class="dropdown-item btn btn-sm" href="{{ route('filter_label') }}">--}}
{{--                    <i class="fa-solid fa-table-cells-large mr-2 text-warning"></i>--}}
{{--                    <span>Filters & Labels</span>--}}
{{--                </a>--}}
{{--                <div class="dropdown-divider"></div>--}}
{{--                <div class="dropdown-item-text text-gray-600 small">--}}
{{--                    Projects--}}
{{--                </div>--}}
            </div>
        </li>
    </ul>

    {{-- Topbar Search --}}
    <input type="text" onkeyup="searchTask(this)" class="d-none d-sm-inline-block ml-3 form-control bg-transparent small search" style="max-width: 200px;max-height: 30px" placeholder="Search...                    /" autocomplete="off">

    {{-- Topbar Navbar --}}
    <ul class="navbar-nav ml-auto">
        {{-- Nav Item - Search Dropdown (Visible Only XS) --}}
        <li class="nav-item dropdown no-arrow d-sm-none mr-1">
            <button type="button" class="btn btn-sm nav-link dropdown-toggle rounded-circle d-flex justify-content-center mr-3" style="width: 30px;height: 30px" id="searchDropdown" role="button"
               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
            </button>
            {{-- Dropdown - Messages --}}
            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <input type="text" onkeyup="searchTask(this)" class="form-control bg-transparent small search" placeholder="Search..." autocomplete="off">
            </div>
        </li>

        <li class="topbar-divider d-none d-sm-block"></li>

        {{-- Nav Item - User Information --}}
        <li class="nav-item dropdown no-arrow d-flex justify-content-center align-items-center">
            <button type="button" class="nav-link dropdown-toggle btn btn-sm bg-danger d-flex justify-content-center rounded-circle"
                    style="height: 30px; width: 30px;" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="d-lg-inline small text-uppercase">{{ substr(auth()->user()->email, 0, 1) }}</span>
            </button>
            {{-- Dropdown - User Information --}}
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <div class="dropdown-item-text text-gray-600 small">
                    {{ auth()->user()->email }}
                </div>
{{--                <a href="#" class="dropdown-item btn btn-sm">--}}
{{--                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-500"></i>--}}
{{--                    Settings--}}
{{--                </a>--}}
                <div class="dropdown-divider"></div>
{{--                <button type="button" class="dropdown-item btn btn-sm">--}}
{{--                    <i class="fa-solid fa-palette mr-2 text-gray-500"></i>--}}
{{--                    Theme--}}
{{--                </button>--}}
{{--                <button type="button" class="dropdown-item btn btn-sm">--}}
{{--                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-500"></i>--}}
{{--                    Activity log--}}
{{--                </button>--}}
                <button type="button" class="dropdown-item btn btn-sm" onclick="pngExport('nestedRoot')">
                    <i class="fa-regular fa-image mr-2 text-gray-500"></i>
                    Export PNG
                </button>
                <button type="button" class="dropdown-item btn btn-sm" onclick="pdfExport('nestedRoot')">
                    <i class="fa-regular fa-file mr-2 text-gray-500"></i>
                    Export PDF
                </button>
                <div class="dropdown-divider"></div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="dropdown-item btn btn-sm">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-500"></i>
                        Logout
                    </button>
                </form>
            </div>
        </li>
    </ul>
</nav>
