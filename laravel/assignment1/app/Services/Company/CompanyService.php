<?php

namespace App\Services\Company;

use App\Contracts\Dao\Company\CompanyDaoInterface;
use App\Contracts\Services\Company\CompanyServiceInterface;
use Illuminate\Http\Request;

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
        $this->companyDao->insertCompany($request);
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
}