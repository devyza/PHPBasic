<?php

namespace App\Contracts\Dao\Company;

use Illuminate\Http\Request;

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

    /**
     * To insert company into datbase
     * @param Request $request request with values
     * @return void
     */
    public function insertCompany(Request $request);

    /**
     * To delete company by id
     * @param string $company company id
     * @return void
     */
    public function deleteCompany($id);
}