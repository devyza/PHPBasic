<?php

namespace App\Contracts\Dao\Task;

use Illuminate\Http\Request;

interface TaskDaoInterface
{
    public function getAllTask();
    public function insertTask(Request $request);
    public function deleteTask($id);
}