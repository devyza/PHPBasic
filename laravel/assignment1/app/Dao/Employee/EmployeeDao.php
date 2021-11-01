<?php

namespace App\Dao\Employee;

use App\Contracts\Dao\Employee\EmployeeDaoInterface;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeDao implements EmployeeDaoInterface
{
    /**
     * To get all employee list with company name
     * 
     * @return array list of employee with company name
     */
    public function getAllEmployee()
    {
        return DB::table('employees')
            ->join('companies', 'employees.company_id', '=', 'companies.id')
            ->select('employees.*', 'companies.name as company_name')
            ->get();
    }

    /**
     * To get employee by Id
     * @param string $id request with employee data
     * @return Employee employee object
     */
    public function getEmployeebyId($id)
    {
        return Employee::find($id);
    }

    /**
     * To insert employee into database
     * @param Request $request values from request
     * @return void
     */
    public function insertEmployee(Employee $employee)
    {
        $employee->save();
    }

    /**
     * To edit employee into datbase
     * @param Request $request values from request
     * @return void
     */
    public function editEmployee(Employee $newEmployee, $id)
    {
        $employee = Employee::find($id);
        $employee->name = $newEmployee->name;
        $employee->jobTitle = $newEmployee->jobTitle;
        $employee->email = $newEmployee->email;
        $employee->nationality = $newEmployee->nationality;
        $employee->company_id = $newEmployee->company_id;
        $employee->save();
    }

    /**
     * To delete employee by id
     * @param string $id employee id
     * @return void
     */
    public function deleteEmployee($id)
    {
        Employee::findOrFail($id)->delete();
    }
}