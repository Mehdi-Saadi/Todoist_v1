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
}
