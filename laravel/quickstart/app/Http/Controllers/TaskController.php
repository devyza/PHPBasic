<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskController
{
    /**
     * Get All Tasks from database
     * 
     * @return View tasks view
     */
    public function getAllTasks()
    {
        $tasks = Task::orderBy('created_at', 'asc')->get();
        return view('tasks', compact('tasks'));
    }

    /**
     * Add Task into database
     */
    public function addTask(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }

        $validated = $validator->validated();
    
        $task = new Task;
        $task->name = $validated['name'];
        $task->save();
    
        return redirect('/');
    }

    /**
     * Delete task by ID
     * @param id $taskId task ID
     */
    public function deleteTask($taskId)
    {
        Task::findOrFail($taskId)->delete();
        return redirect('/');
    }
}