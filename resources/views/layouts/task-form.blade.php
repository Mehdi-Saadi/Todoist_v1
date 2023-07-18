<form class="px-4 py-3 form border bg-white" action="{{ route('createTask') }}" method="post" style="min-height: 230px;" id="taskForm">
    @csrf
    <input type="hidden" name="parent_id" id="parent_id" value="0">
    <input type="hidden" name="is_archive" id="is_archive" value="0">
    <input type="hidden" name="color" id="color" value="">
    <div class="form-group m-0">
        <input type="text" class="form-control my-2 border-0" style="height: 30px" placeholder="Task name" name="name" required autocomplete="off">
        <input type="text" class="form-control mb-4 border-0" style="height: 20px" placeholder="Description" name="description" autocomplete="off">
        <div class="dropdown no-arrow d-inline">
            <button type="button" class="dropdown-toggle btn btn-sm border ml-2"
                    id="priorityDropDown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa-regular fa-flag mr-1"></i>Priority
            </button>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu shadow" aria-labelledby="priorityDropDown">
                <button type="button" class="dropdown-item btn btn-sm" onclick="selectPriority(1)">
                    <i class="fa-solid fa-flag mr-1 text-danger"></i>Priority 1
                </button>
                <button type="button" class="dropdown-item btn btn-sm" onclick="selectPriority(2)">
                    <i class="fa-solid fa-flag mr-1 text-warning"></i>Priority 2
                </button>
                <button type="button" class="dropdown-item btn btn-sm" onclick="selectPriority(3)">
                    <i class="fa-solid fa-flag mr-1 text-primary"></i>Priority 3
                </button>
                <button type="button" class="dropdown-item btn btn-sm" onclick="selectPriority(4)">
                    <i class="fa-regular fa-flag mr-1"></i>Priority 4
                </button>
            </div>
        </div>
        <div class="dropdown no-arrow d-inline">
            <button type="button" class="dropdown-toggle btn btn-sm border ml-2"
                    id="labelDropDown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa-solid fa-tags mr-1"></i>Labels
            </button>
            <!-- Dropdown - labels -->
            <div class="dropdown-menu shadow" aria-labelledby="labelDropDown">
                @foreach($labels as $label)
                    <button type="button" class="dropdown-item btn btn-sm" onclick="setColor(1)">
                        <i class="fa-solid fa-tag mr-1 {{ $label->color }}"></i>{{ $label->name }}
                    </button>
                @endforeach
            </div>
        </div>
    </div>
    <hr>
    <div class="form-group mb-0">
        <button type="submit" class="btn btn-danger btn-sm float-right ml-2">Add task</button>
        <button type="button" class="btn btn-sm float-right border" onclick="hideForm('taskForm'); showBtn('addBtn')">Cancel</button>
    </div>

</form>
