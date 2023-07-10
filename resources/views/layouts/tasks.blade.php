@foreach($tasks as $task)
    <div data-sortable-id="{{ $task->id }}" class="list-group-item" id="{{ $task->id }}">
        <div class="task">
            <div class="row navbar navbar-expand p-0">
                <ul class="navbar-nav mr-auto">
                    <li><i class="fa-regular fa-circle ml-3 mr-1 p-1" onmouseover="showCheck(this)" onmouseleave="showCircle(this)" onclick="done('{{ $task->id }}')"></i></li>
                    <li>{{ $task->name }}</li>
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
        <div class="list-group nested-sortable border-1 border-danger mt-2" style="min-height: 20px">
{{--            @include('layouts.tasks', ['tasks' => $task->child->where('is_archive', 0)->where('is_done', 0)->sortBy('order')])--}}
            @include('layouts.tasks', ['tasks' => $task->child->where('is_archive', 0)->sortBy('order')])
        </div>
    </div>
@endforeach
