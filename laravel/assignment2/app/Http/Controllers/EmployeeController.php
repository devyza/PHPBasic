<?php

namespace App\Http\Controllers;

use App\Contracts\Services\Employee\EmployeeServiceInterface;
use App\Http\Requests\EmployeeFormRequest;
use App\Http\Requests\XlsxUploadRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
    public function addEmployee(EmployeeFormRequest $request)
    {
        $validated = $request->validated();
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
    public function submitEmployeeEditView(EmployeeFormRequest $request, $id)
    {
        $validated = $request->validated();
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

    /**
     * To export exployee information in XLXS format
     */
    public function exportXlxs()
    {
        $this->employeeService->exportXlsx();
    }

    /**
     * To import data from XLXS file to database
     * @param XlsxUploadRequest $requeest request with data value
     */
    public function importXlsx(XlsxUploadRequest $request)
    {
        $ROOT_DIR = 'uploads/';

        if(!is_dir($ROOT_DIR)) {
            mkdir($ROOT_DIR);
        }
        
        $validated =  $request->validated();
        $file = $validated['importFile'];
        $fileName = Storage::putFileAs($ROOT_DIR, $file, $file->getClientOriginalName());

        $this->employeeService->importXlsx($fileName);
        Storage::delete($fileName);
        
        return redirect('/');
    }
}