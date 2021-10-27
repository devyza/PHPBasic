<?php

namespace App\Contracts\Dao\Task;

use Illuminate\Http\Request;

/**
 * Interface of Data Access Object for task
 */
interface TaskDaoInterface
{
    /**
     * To get all task from database
     * 
     * @return Array task list
     */
    public function getAllTask();

    /**
     * To save task
     * @param Request $request request with inputs
     * @return void
     */
    public function insertTask(Request $request);

    /**
     * To delete task by id
     * @param int $id task id
     * @return void
     */
    public function deleteTask($id);
}