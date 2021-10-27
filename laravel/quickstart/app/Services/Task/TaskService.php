<?php

namespace App\Services\Task;

use App\Contracts\Dao\Task\TaskDaoInterface;
use App\Contracts\Services\Task\TaskServiceInterface;
use Illuminate\Http\Request;

class TaskService implements TaskServiceInterface {

    private $taskDao;

    public function __construct(TaskDaoInterface $taskDaoInterface)
    {
        $this->taskDao = $taskDaoInterface;
    }

    public function getTaskList()
    {
        return $this->taskDao->getAllTask();
    }

    public function addTask(Request $request)
    {
        $this->taskDao->insertTask($request);
    }

    public function deleteTask($id)
    {
        $this->taskDao->deleteTask($id);
    }
}