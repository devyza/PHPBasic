<?php

namespace App\Contracts\Dao\Employee;

use Illuminate\Http\Request;

/**
 * Interface for Data Access Object for Employee
 */
interface EmployeeDaoInterface
{
    /**
     * To get all employee list
     * 
     * @return array list of employee
     */
    public function getAllEmployee();

    /**
     * To insert employee into database
     * @param Request $request values from request
     * @return void
     */
    public function insertEmployee(Request $request);

    /**
     * To delete employee by id
     * @param string $id employee id
     * @return void
     */
    public function deleteEmployee($id);
}