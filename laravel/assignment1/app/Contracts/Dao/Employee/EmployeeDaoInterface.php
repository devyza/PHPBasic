<?php

namespace App\Contracts\Dao\Employee;

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
}