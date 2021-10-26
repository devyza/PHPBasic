<?php

namespace App\Http\Controllers\Task;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Rules\FirstCapitalLetter;

class TaskController extends Controller
{
    public function getTaskList() {
        $tasks = Task::orderBy('created_at', 'asc')->get();
        return view('tasks', compact('tasks'));
    }

    public function addTask(Request $request) {
        
        $request->validate([
            'name' => ['required', 'max:255', new FirstCapitalLetter],
        ]);
    
        $task = new Task;
        $task->name = $request->name;
        $task->save();
    
        return redirect('/');
    }

    public function deleteTask($id) {
        Task::findOrFail($id)->delete();
        return redirect('/');
    }
}
