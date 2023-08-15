<div>
    @if($showTaskDetail)
        {{-- task detail modal --}}
        <div class="custom-modal modal d-block">
            <div class="custom-modal-content border rounded animate h-100" style="max-width: 900px;">
                {{-- header of modal --}}
                <div class="border-bottom">
                    <div class="row m-2 d-flex justify-content-between">
                        <button type="button" class="btn btn-sm" onclick="document.querySelector('div.task-detail-modal.d-block').classList.replace('d-block', 'd-none')">
                            <i class="fa-solid fa-inbox mr-2 text-primary"></i>
                            <span>Inbox</span>
                        </button>
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
                            <button type="button" class="btn btn-sm" onclick="document.querySelector('div.custom-modal.d-block').classList.replace('d-block', 'd-none')">
                                <i class="fa-solid fa-close"></i>
                            </button>
                        </div>
                    </div>
                </div>
                {{-- end header of modal --}}
                {{-- selected task and its children --}}
                <div class="row m-0 h-100 overflow-auto" id="grandParentTaskDetail">
                    <div class="col-md-9 overflow-y-auto">
                        {{-- parent task --}}
                        <div class="list-group-item rounded-0 border mt-3" id="task-detail-{{ $task->id }}">
                            <div class="taskSection">
                                <div class="row navbar navbar-expand p-0">
                                    <ul class="navbar-nav mr-auto">
                                        <li>
                                            <button class="btn btn-sm shadow-none p-0 ml-4 rounded-circle d-inline-flex justify-content-center done-circle-btn">
                                                @if($task->is_done)
                                                    <i class="fa-regular fa-circle-check fa-lg" style="color:{{ $task->color }}!important;" onmouseover="showCircle(this)" onmouseleave="showCheck(this)" onclick="serializeAndSendRequestNotDoneTaskDetail('{{ $task->id }}', '{{ $task->id }}')"></i>
                                                @else
                                                    <i class="fa-regular fa-circle fa-lg" style="color:{{ $task->color }}!important;" onmouseover="showCheck(this)" onmouseleave="showCircle(this)" onclick="serializeAndSendRequestDoneTaskDetail('{{ $task->id }}')"></i>
                                                @endif
                                            </button>
                                        </li>
                                        <li>
                                            <span class="btn btn-sm ml-2" style="cursor: auto">{{ $task->name }}</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="row">
                                    <small class="ml-5 pl-2 text-gray-500">{{ $task->description }}</small>
                                </div>
                            </div>
                            <div class="list-group nested-sortable mt-2" style="min-height: 20px">
                                {{-- children tasks --}}
                                @foreach($task->child->sortBy('order') as $child)
                                    <div class="list-group-item rounded-0 border" id="task-detail-{{ $child->id }}">
                                        <div class="taskSection">
                                            <div class="row navbar navbar-expand p-0">
                                                <ul class="navbar-nav mr-auto">
                                                    <li>
                                                        <i class="fa-solid fa-arrows-up-down-left-right text-gray-500 p-1"></i>
                                                        <button class="btn btn-sm shadow-none p-0 rounded-circle d-inline-flex justify-content-center done-circle-btn">
                                                            @if($child->is_done)
                                                                <i class="fa-regular fa-circle-check fa-lg" style="color:{{ $child->color }}!important;" onmouseover="showCircle(this)" onmouseleave="showCheck(this)" onclick="serializeAndSendRequestNotDoneTaskDetail('{{ $child->id }}', '{{ $task->id }}')"></i>
                                                            @else
                                                                <i class="fa-regular fa-circle fa-lg" style="color:{{ $child->color }}!important;" onmouseover="showCheck(this)" onmouseleave="showCircle(this)" onclick="serializeAndSendRequestDoneTaskDetail('{{ $child->id }}')"></i>
                                                            @endif
                                                        </button>
                                                    </li>
                                                    <li>
                                                        <button type="button" class="btn btn-sm pt-0 ml-2" wire:click="$emitTo('layouts.show-task-details', 'showDetail', {{ $child->id }})">{{ $child->name }}</button>
                                                    </li>
                                                </ul>
                                                {{-- tools --}}
                                                <ul class="navbar-nav ml-auto">
                                                    <li></li>
                                                </ul>
                                            </div>
                                            <div class="row">
                                                <small class="ml-5 pl-2 text-gray-500">{{ $child->description }}</small>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                {{-- end children tasks --}}
                            </div>
                        </div>
                        {{-- end parent task --}}
                        {{-- sub task button --}}
                        <div class="justify-content-center mt-2" style="margin-bottom: 8rem;" id="subBtn">
                            <button class="w-100 on-hover-red d-flex justify-content-start border-0 px-2 btn" onclick="showForm('taskFormSub');hideBtn('subBtn')"><i class="fa-solid fa-plus mr-2 p-1"></i>Add sub-task</button>
                        </div>
                        {{-- sub task form --}}
                        {{-- identity variable is for helping to detect the ids in 'addTaskRequest.js' file --}}
                        @include('layouts.task-form', ['task_form_id' => 'taskFormSub', 'add_btn_id' => 'subBtn', 'id' => $task->id, 'identity' => 'task-detail', 'archive_id' => $archive_id])
                    </div>
                    <div class="col-md-3 bg-light rounded-right overflow-y-auto">
                        <div class="m-3">
                            <div>
                                <div>Archive</div>
                                <div>inbox</div>
                            </div>
                            <hr>
                            <div>
                                @if(is_null($task->deadline))
                                    <button type="button" class="btn btn-sm btn-block shadow-none text-left px-0 d-flex justify-content-between">
                                        <span>Due date</span>
                                        <span><i class="fa-solid fa-plus"></i></span>
                                    </button>
                                @else
                                    <div>Due date</div>
                                    <div>today</div>
                                @endif
                            </div>
                            <hr>
                            <div>
                                <div>Priority</div>
                                <div class="dropdown no-arrow d-inline">
                                    <button type="button" class="dropdown-toggle btn btn-sm shadow-none btn-block text-left pl-0"
                                            id="priorityDropDownDetail" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        @switch($task->color)
                                            @case('#db4035')
                                                <i class="fa-solid fa-flag mr-1" style='color: #db4035 !important;'></i>P1
                                                @break
                                            @case('#fad000')
                                                <i class="fa-solid fa-flag mr-1" style='color: #fad000 !important;'></i>P2
                                                @break
                                            @case('#4073ff')
                                                <i class="fa-solid fa-flag mr-1" style='color: #4073ff !important;'></i>P3
                                                @break
                                            @case('#808080')
                                                <i class="fa-solid fa-flag mr-1" style='color: #808080 !important;'></i>P4
                                                @break
                                        @endswitch
                                    </button>
                                    <!-- Dropdown - User Information -->
                                    <div class="dropdown-menu shadow" aria-labelledby="priorityDropDownDetail">
                                        <button type="button" class="dropdown-item btn btn-sm" onclick="selectPriorityTaskDetails(1, {{ $task->id }})">
                                            <i class="fa-solid fa-flag mr-1" style='color: #db4035 !important;'></i>Priority 1
                                        </button>
                                        <button type="button" class="dropdown-item btn btn-sm" onclick="selectPriorityTaskDetails(2, {{ $task->id }})">
                                            <i class="fa-solid fa-flag mr-1" style='color: #fad000 !important;'></i>Priority 2
                                        </button>
                                        <button type="button" class="dropdown-item btn btn-sm" onclick="selectPriorityTaskDetails(3, {{ $task->id }})">
                                            <i class="fa-solid fa-flag mr-1" style='color: #4073ff !important;'></i>Priority 3
                                        </button>
                                        <button type="button" class="dropdown-item btn btn-sm" onclick="selectPriorityTaskDetails(4, {{ $task->id }})">
                                            <i class="fa-regular fa-flag mr-1" style='color: #808080 !important;'></i>Priority 4
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div>
                                <div>Labels</div>
                                <div>inbox</div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end selected task and its children --}}
            </div>
            <script>
                submitTask('taskFormSub', 'task-detail');
                // Get the modal
                const taskDetailModal = document.querySelector('div.custom-modal.d-block');
                // When the user clicks anywhere outside the modal or close button, close it
                window.onclick = function(event) {if(event.target === taskDetailModal) {taskDetailModal.classList.replace('d-block', 'd-none')}}
            </script>
        </div>
    @endif
</div>
