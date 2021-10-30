<?php

namespace App\Contracts\Services\Company;

use Illuminate\Http\Request;

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

    /**
     * To get company by id
     * @param string companyId company Id
     * @return Object company object
     */
    public function getCompanyById($companyId);

    /**
     * To add company into datbase
     * @param Request $request values from request
     * @return void
     */
    public function addCompany(Request $request);

    /**
     * To edit employee by id
     * @param Request $request values from request
     * @param string $companyId  company id
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