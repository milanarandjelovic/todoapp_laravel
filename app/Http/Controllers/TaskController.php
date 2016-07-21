<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\Task;
use App\Models\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id; // login user id
        $user = User::find($user_id);
        $tasks = $user->tasks()->orderBy('created_at', 'desc')->paginate(6);
        return view('task.index')
            ->with('tasks', $tasks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('task.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate input name
        $validator = Validator::make($request->only('name'), [
            'name' => 'required|min:3|max:255'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('task.index')
                ->withErrors($validator)
                ->withInput();
        }

        $user_id = Auth::user()->id; // user id

        // Create a new task
        Task::create([
            'name' => $request->input('name'),
            'user_id' => $user_id
        ]);

        return redirect()
            ->route('task.index')
            ->withSuccess('You have create task.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('task.show')
            ->withId($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::find($id);

        return view('task.edit')
            ->withTask($task);
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
         // Validate input name
        $validator = Validator::make($request->only('name'), [
            'name' => 'required|min:3|max:255'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('task.edit')
                ->withErrors($validator)
                ->withInput();
        }

        Task::where('id', $id)->update([
            'name' => $request->input('name')
        ]);

        return redirect()
            ->route('task.index')
            ->withInfo('Task is updated.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();

        return redirect()
            ->route('task.index')
            ->withInfo('Task is deleted.');
    }
}
