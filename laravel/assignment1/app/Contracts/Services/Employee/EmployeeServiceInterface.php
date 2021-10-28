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
}