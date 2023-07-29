@foreach($tasks as $task)
    <div data-sortable-id="{{ $task->id }}" class="list-group-item rounded-0 border" id="{{ $task->id }}" @if($task->is_done) style="display: none" @endif>
        <div class="taskSection">
            <div class="row navbar navbar-expand p-0">
                <ul class="navbar-nav mr-auto">
                    <li>
                        <button class="btn btn-sm shadow-none p-0 ml-4 rounded-circle d-inline-flex justify-content-center done-circle-btn">
                            @if($task->is_done)
                                <i class="fa-regular fa-circle-check fa-lg {{ $task->color }}" onmouseover="showCircle(this)" onmouseleave="showCheck(this)" onclick="serializeAndSendRequestDone('{{ $task->id }}')"></i>
                            @else
                                <i class="fa-regular fa-circle fa-lg {{ $task->color }}" onmouseover="showCheck(this)" onmouseleave="showCircle(this)" onclick="serializeAndSendRequestDone('{{ $task->id }}')"></i>
                            @endif
                        </button>
                    </li>
{{--                    <li><button type="button" class="btn btn-sm pt-0 ml-2" onclick="sendRequest('post', '/task', {{ $task->id }}, function () {showForm('taskDetails');})">{{ $task->name }}</button></li>--}}
                    <li class="dropdown no-arrow">
                        <button type="button" class="dropdown-toggle btn btn-sm pt-0 ml-2" id="task-{{ $task->id }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ $task->name }}</button>
                        {{-- Dropdown - task details --}}
                        <div class="dropdown-menu dropdown-menu shadow animated--grow-in" aria-labelledby="task-{{ $task->id }}">
                            <button type="button" class="dropdown-item btn btn-sm" onclick="deleteTask({{ $task->id }}, '{{ $task->name }}')">
                                <i class="fa-regular fa-trash-can mr-2 text-danger"></i>
                                Delete task
                            </button>
                        </div>
                    </li>
                </ul>
                {{-- tools --}}
                <ul class="navbar-nav ml-auto">
                    <li><i class="fa-solid fa-arrows-up-down-left-right text-gray-500 mr-3 p-1"></i></li>
                </ul>
            </div>
            <div class="row">
                <small class="ml-5 pl-3 text-gray-500">{{ $task->description }}</small>
            </div>
        </div>
        <div class="list-group nested-sortable mt-2" style="min-height: 20px">
            @include('layouts.tasks', ['tasks' => $task->child->where('is_archive', 0)->sortBy('order')])
        </div>
    </div>
@endforeach
