<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Models\Company;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $task = Task::all();
        $user = User::all();
        $company = Company::all();
        return view('task/index',  ['tasks' => $task, 'users' => $user, 'companies' => $company]);
    }
    public function create(Request $request)
    {
        // $task = new Task();
        // $task->title = 'Testing';
        // $task->save();

        //dd($request->all());
        $task = new Task;
        $task->title = $request->title;
        $task->save();
        return redirect('task')->with('status', 'Inserted Successfully');
    }

    public function edit($id)
    {
        $task = Task::find($id);
        return view('task/edit', ['tasks' => $task]);
    }

    public function update(Request $request, $id)
    {
        $task = Task::find($id);
        $task->title = $request->title;
        $task->save();

        return redirect('task')->with('status', 'Updated Successfully');
    }

    public function destroy($id)
    {
        Task::findOrFail($id)->delete();
        return redirect('task');
    }

    public function home()
    {
        $company = Company::all();
        $tasks = Task::simplepaginate(3);
        $user = User::all();
        return view('task/index', ['users' => $user, 'companies' => $company, 'tasks' => $tasks]);
    }
}
