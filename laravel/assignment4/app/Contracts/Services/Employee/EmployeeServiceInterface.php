<?php

namespace App\Contracts\Services\Employee;

use Illuminate\Http\Request;

/**
 * Interface for Employee Service
 */
interface EmployeeServiceInterface
{
    /**
     * To get employee list
     * 
     * @return array employee list 
     */
    public function getEmployeeList();

    /**
     * To get employee by id
     * @param string id $id employee id
     * @return Employee employee object
     */
    public function getEmployeeById($id);
    
    /**
     * To insert employee into database
     * @param Request $request values from request
     * @return void
     */
    public function addEmployee(Request $request);

    /**
     * To edit employee into datbase
     * @param Request $request values from request
     * @return void
     */
    public function editEmployee(Request $request, $id);
    
    /**
     * To remove employee by id
     * @param string $id employee id
     * @return void
     */
    public function removeEmployee($id);

    /**
     * To export exployee information in XLSX format
     */
    public function exportXlsx();

    /**
     * To import exployee information from XLSX file
     * @param string $filename the name of file
     * @return void
     */
    public function importXlsx($fileName);

    /**
     * To search employee
     * @param Employee employee object to search
     * @param array $validated data values from request
     * @return array list of matched employee
     */
    public function searchEmployee($validated);
}