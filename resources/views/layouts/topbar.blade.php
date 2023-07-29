<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 shadow fixed-top" style="max-height: 50px">

{{--    <!-- Sidebar Toggle (Topbar) -->--}}
{{--    <span id="sidebarToggleTop" class="btn btn-link rounded-2 mr-1">--}}
{{--        <i class="fa fa-bars text-danger"></i>--}}
{{--    </span>--}}
    <ul class="navbar-nav">

        <li class="nav-item dropdown no-arrow d-flex justify-content-center align-items-center">
            <button type="button" class="nav-link dropdown-toggle d-flex justify-content-center btn btn-sm btn-link rounded-2 mr-1"
                    style="max-height: 50px" id="menu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-bars text-danger"></i>
            </button>
            {{-- Dropdown - menu --}}
            <div class="dropdown-menu dropdown-menu-left shadow animated--grow-in" aria-labelledby="menu" style="max-width: 400px; min-width: 250px">
                <a class="dropdown-item btn btn-sm" href="{{ route('inbox') }}">
                    <i class="fa-solid fa-inbox mr-2 text-primary"></i>
                    <span>Inbox</span>
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
    <form
        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
            <input type="text" name="search" class="form-control bg-light border-0 small" style="max-width: 200px" placeholder="Search for..."
                   aria-label="Search" aria-describedby="basic-addon2" autocomplete="off">
            <div class="input-group-append">
                <button class="btn btn-danger" type="submit">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form>

    {{-- Topbar Navbar --}}
    <ul class="navbar-nav ml-auto">

        {{-- Nav Item - Search Dropdown (Visible Only XS) --}}
        <li class="nav-item dropdown no-arrow d-sm-none mr-1">
            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
            </a>
            {{-- Dropdown - Messages --}}
            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                 aria-labelledby="searchDropdown">
                <form action="" class="form-inline mr-auto w-100 navbar-search">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control bg-light border-0 small"
                               placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" autocomplete="off">
                        <div class="input-group-append">
                            <button class="btn btn-danger" type="submit">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
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
