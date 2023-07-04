@foreach($tasks as $task)
    <div data-sortable-id="1.2" class="list-group-item nested-1">
        <i class="fa-solid fa-arrows-up-down-left-right text-gray-500 ml-0 mr-2"></i>
        <i class="fa-regular fa-circle mr-2"></i>
        {{ $task->name }}
        <div class="list-group nested-sortable mt-2">
            @include('layouts.tasks', ['tasks' => $task->child])
        </div>
    </div>
@endforeach
