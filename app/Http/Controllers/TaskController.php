<?php

namespace App\Http\Controllers;


use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use DB;

class TaskController extends Controller
{
    function index()
    {
        $tasks = DB::select('select * from tasks');
        return view('task',['tasks'=>$tasks]);
    }
    function create($id='')
    {
        if($id)
        {
            $task = Task::find($id);
            return view('task.create',['task'=>$task]);
        }
        return view('task.create');
    }
    function store(Request $request,$id='')
    {
        if($id)
        {
            $task = Task::find($id);
        }
        else
        {
            $task = new Task;
        }
        
        $task->name = $request->input('taskname');
        $task->save();
        $tasks = DB::select('select * from tasks');
        return Redirect::to('/')->with(['tasks'=>$tasks]);
    }
    function delete($id)
    {
        DB::delete('DELETE FROM tasks WHERE id = ?', [$id]);
        $tasks = DB::select('select * from tasks');
        return Redirect::to('/')->with(['tasks'=>$tasks,'msg'=>'Task deleted.']);
    }
   
}