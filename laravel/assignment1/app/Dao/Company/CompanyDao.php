<?php

namespace App\Dao\Company;

use App\Contracts\Dao\Company\CompanyDaoInterface;
use App\Models\Company;

/**
 * Data Access Object for company
 */
class CompanyDao implements CompanyDaoInterface
{
    /**
     * To get company list
     * 
     * @return array company list 
     */
    public function getAllCompany()
    {
        return Company::orderBy('name')->get();
    }
}