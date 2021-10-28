<?php

namespace App\Services\Company;

use App\Contracts\Dao\Company\CompanyDaoInterface;
use App\Contracts\Services\Company\CompanyServiceInterface;

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
}