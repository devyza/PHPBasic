<?php

namespace App\Http\Controllers\Task;

use App\Contracts\Services\Task\TaskServiceInterface;
use App\Http\Controllers\Controller;
use App\Rules\FirstCapitalLetter;
use Illuminate\Http\Request;

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

    public function addTask(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:255', new FirstCapitalLetter],
        ]);

        $this->taskServiceInterface->addTask($request);
        return redirect('/');
    }

    public function deleteTask($id) {
        $this->taskServiceInterface->deleteTask($id);
        return redirect('/');
    }
}
