<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;

use function GuzzleHttp\Promise\task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = response()->json(Task::all());
        return $tasks;
    }
    public function show()
    {
        $task = response()->json(Task::find());
        return $task;
    }
    public function destroy($id)
    {
        Task::find($id)->delete;
        return redirect('/task/list'); //view miatt kell return-elni
    }
    public function store(Request $request)
    {
        $task = new Task();
        $task->title =  $request->title;
        $task->description =  $request->description;
        $task->end_date    =  $request->user_id;
        $task->user_id     =  $request->user_id;
        $task->status      =  $request->status;
        return redirect('/task/list');
    }
    public function update(Request $request, $id)
    {
        $task = Task::find($id);
        $task->title =  $request->title;
        $task->description =  $request->description;
        $task->end_date    =  $request->user_id;
        $task->user_id     =  $request->user_id;
        $task->status      =  $request->status;
        return redirect('/task/list');
    }
    public function listview(){
        $tasks = Task::all();
        return view('task.list',['tasks' => $tasks]);
    }
    public function newView(){
        $users = User::all();
        return view('task.new',['users' => $users]);
    }
    public function editView($id){  
        $task = Task::find($id);
        $users = User::all();
        return view('task.edit',['users' => $users, 'task' => $task ]);
    }
}
