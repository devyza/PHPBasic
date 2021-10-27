<?php

namespace App\Http\Controllers\Task;

use App\Contracts\Services\Task\TaskServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddTaskRequest;

class TaskController extends Controller
{
    private $taskServiceInterface;

    public function __construct(TaskServiceInterface $taskServiceInterface)
    {
        $this->taskServiceInterface = $taskServiceInterface;
    }

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
