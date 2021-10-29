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
        return view('index', compact('employeeList'));
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