<?php

namespace App\Services\Employee;

use App\Contracts\Dao\Employee\EmployeeDaoInterface;
use App\Contracts\Services\Employee\EmployeeServiceInterface;
use App\Models\Employee;
use Illuminate\Http\Request;

/**
 * Service class for Employee
 */
class EmployeeService implements EmployeeServiceInterface
{
    /**
     * Employee DAO
     */
    protected $employeeDao;

    /**
     * Class Constructor
     */
    public function __construct(EmployeeDaoInterface $employeeDaoInterface)
    {
        $this->employeeDao = $employeeDaoInterface;
    }

    /**
     * To get all employee list
     * 
     * @return array list of employee
     */
    public function getEmployeeList()
    {
        return $this->employeeDao->getAllEmployee();
    }

    /**
     * To add employee into datbase
     * @param Request $request values from request
     * @return void
     */
    public function addEmployee(Request $request)
    {
        $this->employeeDao->insertEmployee($request);
    }

    /**
     * To remove employee into datbase
     * @param string $id employee id
     * @return void
     */
    public function removeEmployee($id)
    {
        $this->employeeDao->deleteEmployee($id);
    }
}