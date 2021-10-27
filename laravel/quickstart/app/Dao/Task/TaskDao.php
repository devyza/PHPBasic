<?php

namespace App\Dao\Task;

use App\Contracts\Dao\Task\TaskDaoInterface;
use App\Models\Task;
use Illuminate\Http\Request;

/**
 * Data Access Object for Task
 */
class TaskDao implements TaskDaoInterface
{
    /**
     * To get all task from database
     * @return Array task list
     */
    public function getAllTask()
    {
        return Task::orderBy('created_at', 'asc')->get();
    }

    /**
     * To insert task with values from request
     * @param Rrequest $request request with inputs
     */
    public function insertTask(Request $request)
    {
        $task = new Task;
        $task->name = $request->name;
        $task->save();
    }

    /**
     * To delete task by id
     * @param int $id task id 
     */
    public function deleteTask($id)
    {
        Task::findOrFail($id)->delete();
    }
}