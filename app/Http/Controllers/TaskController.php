<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{

    public function index() {

        $user_id = Auth::id();

        $tasks = Task::where('user_id', $user_id)
              ->latest()
              ->simplePaginate(4);

        return view('tasks.index', [ 'tasks' => $tasks ]);
    }

    public function create() {

        return view('tasks.create');
    }

    public function store() {

        request()->validate([
            'title' => ['required'],
            'description' => ['required'],
            'due_date' => ['required']
        ]);

        Task::create([
            'user_id' => Auth::id(),
            'title' => request('title'),
            'description' => request('description'),
            'due_date' => request('due_date'),
            'status' => 'in_process'
        ]);


        return redirect('/tasks');
    }


    public function edit($id) {

        $task = Task::findOrFail($id);

        if ($task->user->isNot(Auth::user())){
            abort(403);
        }


        $due_date_only = $task->due_date->format('Y-m-d');

        return view('tasks.edit', ['task' => $task, 'due_date_only' => $due_date_only]);
    }

    public function update($id) {

        request()->validate([
            'title' => ['required'],
            'description' => ['required'],
            'due_date' => ['required']
        ]);

        $task = Task::findOrFail($id);

        if ($task->user->is(Auth::user())){

            $task->update([
                'title' => request('title'),
                'description' => request('description'),
                'due_date' => request('due_date'),
                'status' => request('status')
            ]);

            return redirect('/tasks');

        }

    }

    public function destroy($id){

        $task = Task::findOrFail($id);
        $task->delete();

        return redirect('/tasks');

    }
}
