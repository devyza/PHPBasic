<?php

namespace App\Services\Employee;

use App\Contracts\Dao\Employee\EmployeeDaoInterface;
use App\Contracts\Services\Employee\EmployeeServiceInterface;
use Illuminate\Http\Request;
use SimpleXLSXGen;

/**
 * Service class for Employee
 */
class EmployeeService implements EmployeeServiceInterface
{
    /**
     * Employee DAO
     */
    protected $employeeDao;

    /**
     * Class Constructor
     */
    public function __construct(EmployeeDaoInterface $employeeDaoInterface)
    {
        $this->employeeDao = $employeeDaoInterface;
    }

    /**
     * To get all employee list
     * 
     * @return array list of employee
     */
    public function getEmployeeList()
    {
        return $this->employeeDao->getAllEmployee();
    }

    /**
     * To get employee by id
     * @param string id $id employee id
     * @return Employee employee object
     */
    public function getEmployeeById($id)
    {
        return $this->employeeDao->getEmployeeById($id);
    }

    /**
     * To add employee into datbase
     * @param Request $request values from request
     * @return void
     */
    public function addEmployee(Request $request)
    {
        $this->employeeDao->insertEmployee($request);
    }

    /**
     * To edit employee into datbase
     * @param Request $request values from request
     * @param string $id employee id
     * @return void
     */
    public function editEmployee(Request $request, $id)
    {
        $this->employeeDao->editEmployee($request, $id);
    }

    /**
     * To remove employee into datbase
     * @param string $id employee id
     * @return void
     */
    public function removeEmployee($id)
    {
        $this->employeeDao->deleteEmployee($id);
    }

    /**
     * To export exployee information in XLXS format
     */
    public function exportXlxs()
    {
        $employeeList = $this->employeeDao->getAllEmployee();
        
        if (count($employeeList) == 0) {
            return;
        }

        $data = array();
        array_push($data, ['id', 'name', 'email', 'nationality', 'company_name', 'created_at', 'update_at']);

        // XLXS Data
        foreach ($employeeList as $row) {
            if ($row->deleted_at == null) {
                array_push($data, [$row->id, $row->name, $row->email, $row->nationality,
                $row->company_name,$row->created_at,$row->updated_at]);
            }
        }

        SimpleXLSXGen::fromArray($data)->download();  
    }
}