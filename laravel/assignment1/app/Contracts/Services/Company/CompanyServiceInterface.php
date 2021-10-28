<?php

namespace App\Contracts\Services\Company;

/**
 * Interface for company service
 */
interface CompanyServiceInterface
{
    /**
     * To get company list
     * 
     * @return array company list 
     */
    public function getCompanyList();
}