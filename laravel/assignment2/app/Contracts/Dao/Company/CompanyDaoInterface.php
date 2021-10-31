<?php

namespace App\Contracts\Dao\Company;

use App\Models\Company;
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
     * To get company by id
     * @param string $companyId company ID
     * @return Object company 
     */
    public function getCompanyById($companyId);

    /**
     * To insert company into datbase
     * @param Company $company company object
     * @return void
     */
    public function insertCompany(Company $company);

      /**
     * To edit employee by ID
     * @param Request $request values from request
     * @param string $companyId company ID
     * @return void
     */
    public function editCompanyById(Request $request, $companyId);

    /**
     * To delete company by id
     * @param string $company company id
     * @return void
     */
    public function deleteCompany($id);
}