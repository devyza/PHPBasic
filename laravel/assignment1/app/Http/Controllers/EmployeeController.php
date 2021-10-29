<?php

namespace App\Http\Controllers;

use App\Contracts\Services\Employee\EmployeeServiceInterface;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Attribute for employee service
     */
    protected $employeeService;

    /**
     * Class Constructor
     * @param EmployeeServiceInterface
     */
    public function __construct(EmployeeServiceInterface $employeeServiceInterface)
    {
        $this->employeeService = $employeeServiceInterface;
    }

    /**
     * To show the employee list
     * 
     * @return View view with employee class list
     */
    public function showEmployeeList()
    {
        $employeeList = $this->employeeService->getEmployeeList();
        return view('employees.add', compact('employeeList'));
    }

    /**
     * To add employee into datbase
     * @param Request $request values from request
     * @return View
     */
    public function addEmployee(Request $request)
    {
        $this->employeeService->addEmployee($request);
        return redirect('/');
    }

    /**
     * To add employee into datbase
     * @param Request $id employee id
     * @return View
     */
    public function showEmployeeEditView($id)
    {
        $employee = $this->employeeService->getEmployeeById($id);
        return view('employees.edit', compact('employee'));
    }

    /**
     * To add employee into datbase
     * @param Request $id employee id
     * @param string $id
     * @return void
     */
    public function submitEmployeeEditView(Request $request, $id)
    {
        $this->employeeService->editEmployee($request, $id);
        return redirect('/');
    }

    /**
     * To delete employee into datbase
     * @param string $id employee id
     * @return View
     */
    public function deleteEmployee($id)
    {
        $this->employeeService->removeEmployee($id);
        return redirect('/');
    }
}