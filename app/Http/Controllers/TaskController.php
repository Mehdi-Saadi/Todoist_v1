<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TaskController extends Controller
{
    public function create(Request $request)
    {
        $data = $request->validate([
            'parent_id' => ['required', Rule::in(['0', Rule::exists('tasks', 'id')])],
            'is_archive' => ['required', Rule::in(['0', '1'])],
            'name' => ['required'],
            'description' => ['max:255'],
        ]);

        auth()->user()->tasks()->create($data);

        toast('Task created', 'success');
        return back();
    }

    public function update(Request $request, Task $task)
    {

    }

    public function destroy(Task $task)
    {

    }

    public function updateAll(Request $request)
    {
        // ajax request required
        if(! $request->ajax()) {
            return response()->json([
                'status' => 'ajax required',
            ]);
        }

        $this->setOrder(auth()->user(), $request);

        return 'serialized';
    }

    /**
     * sets the order of given tasks
     * @param $user
     * @param $tasks
     * @param int $parent_id
     * @return void
     */
    protected function setOrder($user, $submittedTasks, int $parent_id = 0): void
    {
        $submittedTasks = collect($submittedTasks);
        $submittedTasks->each(function ($task, $number) use ($user, $parent_id) {
            $userTask = $user->tasks()->findOrFail($task['id']);
            $userTask->update([
                'parent_id' => $parent_id,
                'order' => ++$number,
            ]);
            if(! empty($task['children'])) {
                $this->setOrder(auth()->user(), $task['children'], $task['id']);
            }
        });
    }
}