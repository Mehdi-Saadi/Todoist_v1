<div id="taskDetails" class="modal">
    <div class="modal-content animate">
        <div class="row m-2 d-flex justify-content-between">
            @if(\Illuminate\Support\Facades\Route::currentRouteName() === 'inbox')
                <a class="btn btn-sm small" href="{{ route('inbox') }}">
                    <i class="fa-solid fa-inbox mr-2 text-primary"></i>
                    <span>Inbox</span>
                </a>
            @endif
            <div class="d-inline-flex">
                <div class="dropdown no-arrow align-items-center">
                    <button type="button" class="btn btn-sm text-gray-600 dropdown-toggle"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="taskMoreTools" title="More actions">
                        <i class="fa-solid fa-ellipsis"></i>
                    </button>
                    <!-- Dropdown - more tools -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="taskMoreTools">
                        <button type="button" class="dropdown-item btn btn-sm" onclick="pngExport('nestedRoot')">
                            <i class="fa-regular fa-image mr-2 text-gray-500"></i>
                            Export PNG
                        </button>
                        <button type="button" class="dropdown-item btn btn-sm" onclick="pdfExport('nestedRoot')">
                            <i class="fa-regular fa-file mr-2 text-gray-500"></i>
                            Export PDF
                        </button>
                        <div class="dropdown-divider"></div>
                        <button class="dropdown-item btn btn-sm" type="button" onclick="">
                            <i class="fa-solid fa-trash mr-2 text-gray-500"></i>
                            Delete task
                        </button>
                    </div>
                </div>
                <button type="button" class="btn btn-sm" onclick="hideForm('taskDetails')"><i class="fa-solid fa-close"></i></button>
            </div>
        </div>
        <div class="row h-100 m-2">
{{--            <form class="modal-content animate px-4 py-3" action="{{ route('createTask') }}" method="post">--}}
{{--                @csrf--}}
{{--                <input type="hidden" name="parent_id" id="parent_id" value="0">--}}
{{--                <input type="hidden" name="is_archive" id="is_archive" value="0">--}}
{{--                <input type="hidden" name="color" id="color" value="text-dark">--}}
{{--                <div class="form-group m-0">--}}
{{--                    <input type="text" class="form-control my-2 border-0" style="height: 30px" placeholder="Task name" name="name" required autocomplete="off">--}}
{{--                    <input type="text" class="form-control mb-4 border-0" style="height: 20px" placeholder="Description" name="description" autocomplete="off">--}}
{{--                    <div class="dropdown no-arrow d-inline">--}}
{{--                        <button type="button" class="dropdown-toggle btn btn-sm ml-2"--}}
{{--                                id="priorityDropDown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                            <i class="fa-regular fa-flag mr-1"></i>Priority--}}
{{--                        </button>--}}
{{--                        <!-- Dropdown - User Information -->--}}
{{--                        <div class="dropdown-menu shadow" aria-labelledby="priorityDropDown">--}}
{{--                            <button type="button" class="dropdown-item btn btn-sm" onclick="selectPriority(1)">--}}
{{--                                <i class="fa-solid fa-flag mr-1 text-danger"></i>Priority 1--}}
{{--                            </button>--}}
{{--                            <button type="button" class="dropdown-item btn btn-sm" onclick="selectPriority(2)">--}}
{{--                                <i class="fa-solid fa-flag mr-1 text-warning"></i>Priority 2--}}
{{--                            </button>--}}
{{--                            <button type="button" class="dropdown-item btn btn-sm" onclick="selectPriority(3)">--}}
{{--                                <i class="fa-solid fa-flag mr-1 text-primary"></i>Priority 3--}}
{{--                            </button>--}}
{{--                            <button type="button" class="dropdown-item btn btn-sm" onclick="selectPriority(4)">--}}
{{--                                <i class="fa-regular fa-flag mr-1"></i>Priority 4--}}
{{--                            </button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="dropdown no-arrow d-inline">--}}
{{--                        <button type="button" class="dropdown-toggle btn btn-sm ml-2"--}}
{{--                                id="labelDropDown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                            <i class="fa-solid fa-tags mr-1"></i>Labels--}}
{{--                        </button>--}}
{{--                        <!-- Dropdown - labels -->--}}
{{--                        <div class="dropdown-menu shadow" aria-labelledby="labelDropDown">--}}
{{--                            @foreach($labels as $label)--}}
{{--                                <button type="button" class="dropdown-item btn btn-sm" onclick="setColor(1)">--}}
{{--                                    <i class="fa-solid fa-tag mr-1 {{ $label->color }}"></i>{{ $label->name }}--}}
{{--                                </button>--}}
{{--                            @endforeach--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="form-group mb-0">--}}
{{--                    <hr>--}}
{{--                    <button type="submit" class="btn btn-danger btn-sm float-right ml-2">Add task</button>--}}
{{--                    <button type="button" class="btn btn-sm float-right" onclick="hideForm('taskDetails')">Cancel</button>--}}
{{--                </div>--}}

{{--                <!-- show errors if exists -->--}}
{{--                @error('name')--}}
{{--                @php--}}
{{--                    toast("$message", 'error');--}}
{{--                @endphp--}}
{{--                @enderror--}}

{{--                @error('description')--}}
{{--                @php--}}
{{--                    toast("$message", 'error');--}}
{{--                @endphp--}}
{{--                @enderror--}}

{{--                @error('parent_id')--}}
{{--                @php--}}
{{--                    toast("$message", 'error');--}}
{{--                @endphp--}}
{{--                @enderror--}}

{{--                @error('is_archive')--}}
{{--                @php--}}
{{--                    toast("$message", 'error');--}}
{{--                @endphp--}}
{{--                @enderror--}}

{{--            </form>--}}
        </div>
    </div>
</div>
