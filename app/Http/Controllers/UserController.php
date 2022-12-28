<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Models\Company;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        $company = Company::all();
        $tasks = Task::all();
        return view('user/index', ['users' => $user, 'companies' => $company, 'tasks' => $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // $user = new User();
        // $user->name = 'Deep';
        // $user->email = 'deep@gmail.com';
        // $user->save();

        // $taskids = [4];
        // $user->pivot()->attach($taskids);
        //dd($request->all());
        $user = new User;
        $user->company_id = $request->company;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return redirect('user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::all();
        $task = Task::whereHas('users', function ($query) use ($id) {
            $query->where('user_id', $id);
        })->get();
        // $task = Task::with('users')->get();
        $company = Company::all();
        // dd($company->toArray());
        return view('user/task', ['users' => $user, 'tasks' => $task, 'companies' => $company]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('user/edit', ['users' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect('user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect('user');
    }
}
