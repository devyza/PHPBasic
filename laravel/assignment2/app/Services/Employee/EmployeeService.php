<?php

namespace App\Services\Employee;

use App\Contracts\Dao\Employee\EmployeeDaoInterface;
use App\Contracts\Services\Employee\EmployeeServiceInterface;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use SimpleXLSX;
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
    public function addEmployee($validated)
    {
        $employee = new Employee;
        $employee->name = $validated['name'];
        $employee->jobTitle = $validated['jobTitle'];
        $employee->email = $validated['email'];
        $employee->nationality = $validated['nationality'];
        $employee->company_id = $validated['company_id'];
        $this->employeeDao->insertEmployee($employee);
    }

    /**
     * To edit employee into datbase
     * @param array $array validated data in array from request
     * @param string $id employee id
     * @return void
     */
    public function editEmployee($validated, $id)
    {
        $employee = new Employee;
        $employee->name = $validated['name'];
        $employee->jobTitle = $validated['jobTitle'];
        $employee->email = $validated['email'];
        $employee->nationality = $validated['nationality'];
        $employee->company_id = $validated['company_id'];
        $this->employeeDao->editEmployee($employee, $id);
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
    public function exportXlsx()
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

    public function importXlsx($fileName)
    {
        $file = Storage::path($fileName);

        if ($xlsx = SimpleXLSX::parse($file)) {

            $isHeader = true;
            foreach( $xlsx->rows() as $row ) {      
                if ($isHeader == false ) {
                    $employee = new Employee;
                    $employee->name = $row[0];
                    $employee->jobTitle = $row[1];
                    $employee->email = $row[2];
                    $employee->nationality = $row[3];
                    $employee->company_id = $row[4];
                    $this->employeeDao->insertEmployee($employee);
                } else {
                    $isHeader = false;
                }
            }
        }
    }
}
