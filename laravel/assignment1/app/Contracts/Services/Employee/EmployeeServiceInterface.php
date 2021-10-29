<?php

namespace App\Contracts\Services\Employee;

use Illuminate\Http\Request;

/**
 * Interface for Employee Service
 */
interface EmployeeServiceInterface
{
    /**
     * To get employee list
     * 
     * @return array employee list 
     */
    public function getEmployeeList();
    
    /**
     * To insert employee into database
     * @param Request $request values from request
     * @return void
     */
    public function addEmployee(Request $request);

    /**
     * To remove employee by id
     * @param string $id employee id
     * @return void
     */
    public function removeEmployee($id);
}