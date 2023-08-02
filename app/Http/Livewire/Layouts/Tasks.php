<?php

namespace App\Http\Livewire\Layouts;

use Livewire\Component;

class Tasks extends Component
{
    public $user;
    public $tasks;
    public $labels;
    public $showAllTasks = false;

    protected $listeners = [
        'showCompleted' => 'showCompleted',
        'hideCompleted' => 'hideCompleted'
    ];

    /**
     * initializes the 'tasks' property,
     * shows only not finished tasks
     * @return void
     */
    public function mount()
    {
        $this->user = auth()->user();
        $this->tasks = $this->user->tasks->where('is_archive', 0)->where('parent_id', 0)->where('is_done', 0)->sortBy('order');
        $this->labels = $this->user->labels;
    }

    /**
     * shows all tasks
     * @return void
     */
    public function showCompleted()
    {
        $this->tasks = $this->user->tasks->where('is_archive', 0)->where('parent_id', 0)->sortBy('order');
        $this->showAllTasks = true;
        $this->emit('showCompletedDone');
    }

    public function hideCompleted()
    {
        $this->tasks = $this->user->tasks->where('is_archive', 0)->where('parent_id', 0)->where('is_done', 0)->sortBy('order');
        $this->showAllTasks = false;
        $this->emit('hideCompletedDone');
    }

    public function render()
    {
        if ($this->showAllTasks) {
            return view('livewire.layouts.tasks-all');
        } else {
            return view('livewire.layouts.tasks');
        }
    }
}
