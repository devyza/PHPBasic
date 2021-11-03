<?php

namespace App\Contracts\Dao\Employee;

use App\Models\Employee;
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
     * To get employee by Id
     * @param string $id employee id
     * @return Employee employee object
     */
    public function getEmployeebyId($id);

    /**
     * To insert employee into database
     * @param Employee $employee employee object
     * @return void
     */
    public function insertEmployee(Employee $employee);

    /**
     * To edit employee into datbase
     * @param Request $request values from request
     * @return void
     */
    public function editEmployee(Employee $employee, $id);

    /**
     * To delete employee by id
     * @param string $id employee id
     * @return void
     */
    public function deleteEmployee($id);
}