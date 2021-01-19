<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\task;


class taskcontroller extends Controller
{

    public function home(){
        $tasks = task::all()->sortByDesc('id');

        return view('welcome')->with('tasks' , $tasks);
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required|max:255',
            'date' => 'required',
            'time' => 'required',
            'description' => 'required',
        ]);
        
        task::create([
            'title' => $request->title,
            'date' => $request->date,
            'time' => $request->time,
            'description' => $request->description 
        ]);

            return redirect()->back()->with('message', 'New task uploaded successfully');
    }

    public function show($id){
        $task= task::findOrFail($id);

        return view('task')->with('task' , $task);
    }

    public function updateToOngoing($id){
        $task= task::find($id);
        $task->update([
            'status' => 2
        ]);
        return redirect()->back()->with('message', 'Task successfully updated to ongoing');
    }

    public function updateToDone($id){
        $task= task::find($id);
        $task->update([
            'status' => 3
        ]);
        return redirect()->back()->with('message', 'Task successfully updated to Done');
    }

    public function deleteTask($id){
        $task = task::find($id);

        $task->delete();

        return redirect()->route('task.home')->with('message', 'Task deleted successfully');
    }
}
