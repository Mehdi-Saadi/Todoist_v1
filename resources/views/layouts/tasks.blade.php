@foreach($tasks as $task)
    <div data-sortable-id="{{ $task->id }}" class="list-group-item">
        <div class="task">
            <i class="fa-solid fa-arrows-up-down-left-right text-gray-500 ml-0 p-1"></i>
            <i class="fa-regular fa-circle mr-1 p-1" onmouseover="showCheck(this)" onmouseleave="showCircle(this)"></i>
            {{ $task->name }}
        </div>
        <div class="list-group nested-sortable border-1 border-danger mt-2" style="min-height: 20px">
            @include('layouts.tasks', ['tasks' => $task->child->sortBy('order')])
        </div>
    </div>
@endforeach
