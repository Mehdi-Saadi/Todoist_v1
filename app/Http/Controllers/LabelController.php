<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class LabelController extends Controller
{
    public function create(Request $request)
    {
        $data = $request->validate([
            'color' => [Rule::exists('colors', 'code')],
            'name' => ['required'],
        ]);

        $user = auth()->user();

        // add the submited label at end of list for first time
        $data['order'] = $user->labels()->max('order');
        ++$data['order'];

        $label = $user->labels()->create($data);

        return response()->json($label);
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
     * sets the order of given labels
     * @param $user
     * @param $submittedLabels
     * @return void
     */
    protected function setOrder($user, $submittedLabels): void
    {
        $submittedLabels = collect($submittedLabels);
        $submittedLabels->each(function ($label, $number) use ($user) {
            $userLabel = $user->labels()->findOrFail($label['id']);
            $userLabel->update([
                'order' => ++$number,
            ]);
        });
    }
}
