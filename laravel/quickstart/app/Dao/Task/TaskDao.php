<?php

namespace App\Dao\Task;

use App\Contracts\Dao\Task\TaskDaoInterface;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskDao implements TaskDaoInterface
{
    public function getAllTask()
    {
        return Task::orderBy('created_at', 'asc')->get();
    }

    public function insertTask(Request $request)
    {
        $task = new Task;
        $task->name = $request->name;
        $task->save();
    }

    public function deleteTask($id)
    {
        Task::findOrFail($id)->delete();
    }
}