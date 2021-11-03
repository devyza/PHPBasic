<?php

namespace App\Contracts\Services\Employee;

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
     * @param array $validated validated data in array from request
     * @return void
     */
    public function addEmployee($validated);

    /**
     * To edit employee into datbase
     * @param array $array validated data in array from request
     * @param string $id employee id
     * @return void
     */
    public function editEmployee($validated, $id);
    
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
}