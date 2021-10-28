<?php

namespace App\Contracts\Dao\Company;

/**
 * Interface for Data Access Object for company
 */
interface CompanyDaoInterface
{
    /**
     * To get all company list
     * 
     * @return array list of company
     */
    public function getAllCompany();
}