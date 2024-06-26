@foreach($tasks as $task)
    <div class="list-group-item rounded-0 border" id="{{ $task->id }}">
        <div class="taskSection">
            <div class="row navbar navbar-expand p-0">
                <ul class="navbar-nav mr-auto">
                    <li>
                        <i class="fa-solid fa-arrows-up-down-left-right text-gray-500 p-1"></i>
                        <button class="btn btn-sm shadow-none p-0 rounded-circle d-inline-flex justify-content-center done-circle-btn">
                            <i class="fa-regular fa-circle fa-lg" style="color:{{ $task->color }}!important;" onmouseover="showCheck(this)" onmouseleave="showCircle(this)" onclick="serializeAndSendRequestDone('{{ $task->id }}')"></i>
                        </button>
                    </li>
                    <li>
                        <button type="button" class="btn btn-sm ml-2" wire:click="$emitTo('layouts.show-task-details', 'showDetail', {{ $task->id }})">{{ $task->name }}</button>
                    </li>
                </ul>
                {{-- tools --}}
                <ul class="navbar-nav ml-auto">
                    <li></li>
                </ul>
            </div>
            <div class="row">
                <small class="ml-5 pl-3 text-gray-500">{{ $task->description }}</small>
            </div>
        </div>
        <div class="list-group nested-sortable mt-2" style="min-height: 20px">
            @include('layouts.tasks', ['tasks' => $task->child->where('is_done', 0)->sortBy('order')])
        </div>
    </div>
@endforeach
