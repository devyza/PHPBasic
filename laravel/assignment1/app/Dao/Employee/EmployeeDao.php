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
     * To insert employee into database
     * @param Request $request values from request
     * @return void
     */
    public function insertEmployee(Request $request)
    {
        $employee = new Employee;
        $employee->name = $request->name;
        $employee->jobTitle = $request->jobTitle;
        $employee->email = $request->email;
        $employee->nationality = $request->nationality;
        $employee->company_id = (int)($request->company_id);
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