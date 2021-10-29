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
     * To add company into datbase
     * @param Request $request values from request
     * @return void
     */
    public function addCompany(Request $request);

    /**
     * To delete company by id
     * @param string $company company id
     * @return void
     */
    public function deleteCompany($id);
}