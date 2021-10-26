<?php

namespace App\Http\Controllers\Task;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\Task;

class TaskController extends Controller
{
    public function getTaskList() {
        $tasks = Task::orderBy('created_at', 'asc')->get();
        return view('tasks', compact('tasks'));
    }

    public function addTask(Request $request) {
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);
    
        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }
    
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
