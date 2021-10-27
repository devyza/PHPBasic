<?php

namespace App\Contracts\Services\Task;

use Illuminate\Http\Request;

/**
 * Interface for task service
 */
interface TaskServiceInterface
{
    /**
     * To get task list
     * 
     * @return Array task list
     */
    public function getTaskList();

    /**
     * To add task
     * @param Request $request request with inputs
     * @return void
     */
    public function addTask(Request $request);

    /**
     * To delete task by id
     * @param int $id task id
     * @return void
     */
    public function deleteTask($id);
}