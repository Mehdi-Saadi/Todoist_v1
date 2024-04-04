<form class="px-4 py-3 form border bg-white" action="" method="post" style="min-height: 230px;" id="{{ $task_form_id }}">
    @csrf
    <input type="hidden" name="parent_id" id="parent_id-{{ $identity }}" value="{{ $id }}">
    <input type="hidden" name="archive_id" id="archive_id-{{ $identity }}" value="{{ $inbox->id }}">
    <input type="hidden" name="color" id="color-{{ $identity }}" value="#808080">
    <input type="hidden" name="label" id="label-{{ $identity }}" value="">
    <div class="form-group m-0">
        <input onkeyup="disableBtn(this, 'addTaskBtn-{{ $identity }}')" type="text" class="form-control my-2 border-0" style="height: 30px" placeholder="Task name" name="name" autocomplete="off">
        <input type="text" class="form-control mb-2 border-0" style="height: 25px" placeholder="Description" name="description" autocomplete="off">
        <div class="dropdown no-arrow d-inline">
            <button type="button" class="dropdown-toggle btn btn-sm border ml-2"
                    id="priorityDropDown-{{ $identity }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa-regular fa-flag mr-2"></i>Priority
            </button>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu shadow" aria-labelledby="priorityDropDown-{{ $identity }}">
                <button type="button" class="dropdown-item btn btn-sm" onclick="selectPriority(1,'color-{{ $identity }}' , 'priorityDropDown-{{ $identity }}')">
                    <i class="fa-solid fa-flag mr-2" style='color: #db4035 !important;'></i>Priority 1
                </button>
                <button type="button" class="dropdown-item btn btn-sm" onclick="selectPriority(2,'color-{{ $identity }}' , 'priorityDropDown-{{ $identity }}')">
                    <i class="fa-solid fa-flag mr-2" style='color: #fad000 !important;'></i>Priority 2
                </button>
                <button type="button" class="dropdown-item btn btn-sm" onclick="selectPriority(3,'color-{{ $identity }}' , 'priorityDropDown-{{ $identity }}')">
                    <i class="fa-solid fa-flag mr-2" style='color: #4073ff !important;'></i>Priority 3
                </button>
                <button type="button" class="dropdown-item btn btn-sm" onclick="selectPriority(4,'color-{{ $identity }}' , 'priorityDropDown-{{ $identity }}')">
                    <i class="fa-regular fa-flag mr-2" style='color: #808080 !important;'></i>Priority 4
                </button>
            </div>
        </div>
        <div class="dropdown no-arrow d-inline">
            <button type="button" class="dropdown-toggle btn btn-sm border ml-2"
                    id="labelDropDown-{{ $identity }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa-solid fa-tags mr-2"></i>Labels
            </button>
            {{-- Dropdown - labels --}}
            <div class="dropdown-menu shadow" aria-labelledby="labelDropDown-{{ $identity }}">
                @foreach($labels as $label)
                    <button type="button" class="dropdown-item btn btn-sm" onclick="selectLabel('{{ $label->color}}', '{{ $label->name }}', 'label-{{ $identity }}', 'labelDropDown-{{ $identity }}')">
                        <i class="fa-solid fa-tag mr-2" style="color: {{ $label->color }} !important;"></i>{{ $label->name }}
                    </button>
                @endforeach
            </div>
        </div>
    </div>
    <hr>
    <div class="form-group mb-0">
        <button type="button" class="btn btn-danger btn-sm float-right ml-2" id="addTaskBtn-{{ $identity }}" disabled>Add task</button>
        <button type="button" class="btn btn-sm float-right border" onclick="hideForm('{{ $task_form_id }}');showBtn('{{ $add_btn_id }}')">Cancel</button>
    </div>
</form>
