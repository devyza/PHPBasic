<?php

namespace App\Http\Controllers;

use App\Contracts\Services\Employee\EmployeeServiceInterface;
use App\Contracts\Services\Mail\MailServiceInterface;
use App\Http\Requests\EmployeeFormRequest;
use App\Http\Requests\MailFormRequest;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Attribute for employee service
     */
    protected $employeeService;
    protected $mailService;

    /**
     * Class Constructor
     * @param EmployeeServiceInterface
     */
    public function __construct(EmployeeServiceInterface $employeeServiceInterface, 
        MailServiceInterface $mailServiceInterface)
    {
        $this->employeeService = $employeeServiceInterface;
        $this->mailService = $mailServiceInterface;
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
     * @param EmployeeFormRequest $request values from request
     * @return void
     */
    public function addEmployee(EmployeeFormRequest $request)
    {
        $validated = $request->validated();
        $this->employeeService->addEmployee($validated);
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
     * @param EmployeeFormRequest $id employee id
     * @param string $id
     * @return void
     */
    public function submitEmployeeEditView(EmployeeFormRequest $request, $id)
    {
        $validated = $request->validated();
        $this->employeeService->editEmployee($validated, $id);
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

    /**
     * To show employee into datbase
     * @param string $id employee id
     * @return View
     */
    public function showEmployeeMailView($id) {
        $employee = $this->employeeService->getEmployeeById($id);
        return view('employees.mail', compact('employee'));
    }

    /**
     * To delete employee into datbase
     * @param string $id employee id
     * @return View
     */
    public function submitMailSendView(MailFormRequest $request) {

        $validated = $request->validated();

        $this->mailService->sendMail($validated);
        return redirect('/');
    }
}