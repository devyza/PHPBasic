<?php

namespace App\Services\Task;

use App\Contracts\Dao\Task\TaskDaoInterface;
use App\Contracts\Services\Task\TaskServiceInterface;
use Illuminate\Http\Request;

/**
 * Service class for task
 */
class TaskService implements TaskServiceInterface {

    /**
     * Service DAO
     */
    private $taskDao;

    /**
     * Class Constructor
     * @param TaskDaoInterface
     * @return void
     */
    public function __construct(TaskDaoInterface $taskDaoInterface)
    {
        $this->taskDao = $taskDaoInterface;
    }

    /**
     * To get task list
     * 
     * @return array task list
     */
    public function getTaskList()
    {
        return $this->taskDao->getAllTask();
    }

    /**
     * Add task with values from request
     * @param Request $request request with value
     * @return void
     */
    public function addTask(Request $request)
    {
        $this->taskDao->insertTask($request);
    }

    /**
     * To delete task by id
     * @param $id task id
     * @return void
     */
    public function deleteTask($id)
    {
        $this->taskDao->deleteTask($id);
    }
}