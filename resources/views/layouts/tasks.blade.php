@foreach($tasks as $task)
    <div data-sortable-id="{{ $task->id }}" class="list-group-item rounded-0 border" id="{{ $task->id }}">
        <div class="taskSection">
            <div class="row navbar navbar-expand p-0">
                <ul class="navbar-nav mr-auto">
                    <li><button class="btn btn-sm p-0 ml-4 rounded-circle d-inline-flex justify-content-center" style="width: 15px; height: 15px;">
                            <i class="fa-regular fa-circle {{ $task->color }}" onmouseover="showCheck(this)" onmouseleave="showCircle(this)" onclick="done('{{ $task->id }}')"></i>
                        </button></li>
                    <li><button type="button" class="btn btn-sm pt-0 ml-2" onclick="sendRequest('post', '/task', {{ $task->id }}, function () {showForm('taskDetails');})">{{ $task->name }}</button></li>
                </ul>
                <!-- tools -->
                <ul class="navbar-nav ml-auto">

                    <li><i class="fa-solid fa-arrows-up-down-left-right text-gray-500 mr-3 p-1"></i></li>

                </ul>
            </div>
            <div class="row">
                <small class="ml-5 text-gray-500">{{ $task->description }}</small>
            </div>
        </div>
        <div class="list-group nested-sortable mt-2" style="min-height: 20px">
            @include('layouts.tasks', ['tasks' => $task->child->where('is_archive', 0)->where('is_done', 0)->sortBy('order')])
{{--            @include('layouts.tasks', ['tasks' => $task->child->where('is_archive', 0)->sortBy('order')])--}}
        </div>
    </div>
@endforeach
