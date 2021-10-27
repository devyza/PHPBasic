<?php

namespace App\Services\Task;

use App\Contracts\Services\Task\TaskServiceInterface;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskService implements TaskServiceInterface {

    public function getTaskList()
    {
        return Task::orderBy('created_at', 'asc')->get();
    }

    public function addTask(Request $request) {
        $task = new Task;
        $task->name = $request->name;
        $task->save();
    }

    public function deleteTask($id){
        Task::findOrFail($id)->delete();
    }
}