<?php

namespace App\Http\Livewire\Layouts;

use Livewire\Component;

class Tasks extends Component
{
    public $user;
    public $tasks;
    public $labels;
    public bool $showAllTasks = false;
    protected $listeners = [
        'showCompleted',
        'hideCompleted'
    ];

    /**
     * initializes the 'tasks' property,
     * shows only not finished tasks
     * @return void
     */
    public function mount()
    {
        $this->user = auth()->user();
        $this->tasks = $this->user->tasks->where('parent_id', 0)->where('is_done', 0)->sortBy('order');
        $this->labels = $this->user->labels;
    }

    /**
     * shows all tasks
     * @return void
     */
    public function showCompleted()
    {
        $this->tasks = $this->user->tasks->where('parent_id', 0)->sortBy('order');
        $this->showAllTasks = true;
        $this->dispatchBrowserEvent('showCompletedDone');
    }

    public function hideCompleted()
    {
        $this->tasks = $this->user->tasks->where('parent_id', 0)->where('is_done', 0)->sortBy('order');
        $this->showAllTasks = false;
        $this->dispatchBrowserEvent('hideCompletedDone');
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
