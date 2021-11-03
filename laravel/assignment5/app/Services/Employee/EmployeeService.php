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
     * To get employee by id
     * @param string id $id employee id
     * @return Employee employee object
     */
    public function getEmployeeById($id)
    {
        return $this->employeeDao->getEmployeeById($id);
    }

    /**
     * To add employee into datbase
     * @param Request $request values from request
     * @return void
     */
    public function addEmployee($validated)
    {
        $employee = new Employee;
        $employee->name = $validated['name'];
        $employee->jobTitle = $validated['jobTitle'];
        $employee->email = $validated['email'];
        $employee->nationality = $validated['nationality'];
        $employee->company_id = $validated['company_id'];
        $this->employeeDao->insertEmployee($employee);
    }

    /**
     * To edit employee into datbase
     * @param array $array validated data in array from request
     * @param string $id employee id
     * @return void
     */
    public function editEmployee($validated, $id)
    {
        $employee = new Employee;
        $employee->name = $validated['name'];
        $employee->jobTitle = $validated['jobTitle'];
        $employee->email = $validated['email'];
        $employee->nationality = $validated['nationality'];
        $employee->company_id = $validated['company_id'];
        $this->employeeDao->editEmployee($employee, $id);
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