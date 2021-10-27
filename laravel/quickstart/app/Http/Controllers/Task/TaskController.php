<?php

namespace App\Http\Controllers\Task;

use App\Contracts\Services\Task\TaskServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddTaskRequest;

/**
 * Task Controller for POST CRUD processing 
 */
class TaskController extends Controller
{
    /**
     * Task service interface
     */
    private $taskServiceInterface;

    /**
     * Create a new controller instance
     */
    public function __construct(TaskServiceInterface $taskServiceInterface)
    {
        $this->taskServiceInterface = $taskServiceInterface;
    }

    /**
     * 
     */
    public function getTaskList() {
        $tasks = $this->taskServiceInterface->getTaskList();
        return view('tasks', compact('tasks'));
    }

    public function addTask(AddTaskRequest $request)
    {
        $this->taskServiceInterface->addTask($request);
        return redirect('/');
    }

    public function deleteTask($id) {
        $this->taskServiceInterface->deleteTask($id);
        return redirect('/');
    }
}
