<?php

namespace App\Services\Company;

use App\Contracts\Dao\Company\CompanyDaoInterface;
use App\Contracts\Services\Company\CompanyServiceInterface;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use SimpleXLSX;
use SimpleXLSXGen;

/**
 * Service Class for Company
 */
class CompanyService implements CompanyServiceInterface
{
    /**
     * Company DAO
     */
    protected $companyDao;

    /**
     * Class Constructor
     */
    public function __construct(CompanyDaoInterface $companyDaoInterface)
    {
        $this->companyDao = $companyDaoInterface;
    }

    /**
     * To get company list
     * 
     * @return array company list 
     */
    public function getCompanyList()
    {
        return $this->companyDao->getAllCompany();
    }

    /**
     * To get company by id
     * 
     * @return Object company 
     */
    public function getCompanyById($companyId)
    {
        return $this->companyDao->getCompanyById($companyId);
    }
    
    /**
     * To add company into datbase
     * @param Request $request values from request
     * @return void
     */
    public function addCompany(Request $request)
    {
        $company = new Company();
        $company->name = $request->name;
        $company->country = $request->country; 
        $this->companyDao->insertCompany($company);
    }

      /**
     * To edit employee into datbase
     * @param Request $request values from request
     * @return void
     */
    public function editCompanyById(Request $request, $companyId)
    {
        $this->companyDao->editCompanyById($request, $companyId);
    }

    /**
     * To delete company by id
     * @param string $company company id
     * @return void
     */
    public function deleteCompany($id)
    {
        $this->companyDao->deleteCompany($id);
    }

    /**
     * To export company information in XLXS format
     */
    public function exportXlsx()
    {
        $companyList = $this->companyDao->getAllCompany();

        if(count($companyList) == 0) {
            return;
        }

        $data = array();
        array_push($data, ['id', 'name', 'country', 'created_at', 'updated_at']);

        foreach ($companyList as $row) {
            if ($row->deleted_at == null) {
                array_push($data, 
                    [$row->id, $row->name, $row->country, $row->created_at, $row->updated_at]);
            }
        }

        SimpleXLSXGen::fromArray($data)->download();
    }

    /**
     * To import data from XlSX file into database
     * @param string $filename the name of file
     * @return void
     */
    public function importXlsx($fileName)
    {
        $file = Storage::path($fileName);

        if ($xlsx = SimpleXLSX::parse($file)) {

            $isHeader = true;
            foreach( $xlsx->rows() as $row ) {      
                if ($isHeader == false ) {
                    $company = new Company();
                    $company->name = $row[0];
                    $company->country = $row[1];
                    $this->companyDao->insertCompany($company);
                } else {
                    $isHeader = false;
                }
            }
        }
    }
}