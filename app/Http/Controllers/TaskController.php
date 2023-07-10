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

        $user = auth()->user();

        // add the submited task at end of list for first time
        $data['order'] = $user->tasks()->where('is_archive', 0)->where('parent_id', 0)->max('order');
        ++$data['order'];

        $user->tasks()->create($data);

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

    public function setDoneTask(Request $request)
    {
        // ajax request required
        if(! $request->ajax()) {
            return response()->json([
                'status' => 'ajax required',
            ]);
        }

        $this->setDone(auth()->user(), $request);

        return 'done';
    }

    /**
     * sets the order of given tasks
     * @param $user
     * @param $submittedTasks
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

    /**
     * sets is_done to 1 for each given task
     * @param $user
     * @param $submittedTasks
     * @return void
     */
    protected function setDone($user, $submittedTasks): void
    {
        $submittedTasks = collect($submittedTasks);
        $submittedTasks->each(function ($task) use ($user) {
            $userTask = $user->tasks()->findOrFail($task['id']);
            $userTask->update([
                'is_done' => 1,
            ]);
            if(! empty($task['children'])) {
                $this->setDone(auth()->user(), $task['children']);
            }
        });
    }
}
