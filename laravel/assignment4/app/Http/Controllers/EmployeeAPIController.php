<?php

namespace App\Http\Controllers;

use App\Contracts\Services\Employee\EmployeeServiceInterface;
use App\Http\Requests\EmployeeFormRequest;
use Illuminate\Http\Response;

class EmployeeAPIController extends Controller
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
     * To get the employee list
     * 
     * @return Response json with employee list in JSON
     */
    public function getEmployeeList()
    {
        return response()->json($this->employeeService->getEmployeeList());
    }

    /**
     * To add employee into datbase
     * @param EmployeeFormRequest $request values from request
     * @return Response response from add employee
     */
    public function addEmployee(EmployeeFormRequest $request)
    {
        $validated = $request->validated();
        $this->employeeService->addEmployee($request);
        return response()->json(['msg' => "Employee has Successfully Saved"]);
    }

    /**
     * To add employee into datbase
     * @param EmployeeFormRequest $id employee id
     * @param string $id
     * @return Response respnse from updating employee
     */
    public function editEmployee(EmployeeFormRequest $request)
    {
        $validated = $request->validated();
        $this->employeeService->editEmployee($request, $validated['id']);
        return response()->json(['msg' => "Employee has Successfully Updated"]);
    }

    /**
     * To delete employee into datbase
     * @param string $id employee id
     * @return Response response from delete employee
     */
    public function deleteEmployee($id)
    {
        $this->employeeService->removeEmployee($id);
        return response()->json(['msg' => "Employee has Successfully Deleted"]);
    }
}