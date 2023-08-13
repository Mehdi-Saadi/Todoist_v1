<?php

namespace App\Http\Livewire\Layouts;

use App\Models\Task;
use Livewire\Component;

class ShowTaskDetails extends Component
{
    public $task;
    public bool $showTaskDetail = false;
    public $archive_id;
    public $listeners = [
        'showDetail'
    ];

    public function showDetail($task)
    {
        $this->task = Task::find($task);
        $this->showTaskDetail = true;
    }

    public function render()
    {
        return view('livewire.layouts.show-task-details');
    }
}
