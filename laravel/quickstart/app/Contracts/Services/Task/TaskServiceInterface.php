<?php

namespace App\Contracts\Services\Task;

use Illuminate\Http\Request;

interface TaskServiceInterface {
    public function getTaskList();
    public function addTask(Request $request);
    public function deleteTask($id);
}