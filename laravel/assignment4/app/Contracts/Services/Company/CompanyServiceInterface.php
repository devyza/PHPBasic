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

    /**
     * To export company information in XLSX format
     */
    public function exportXlsx();

    /**
     * To import data from XlSX file into database
     * @param string $filename name of the file
     * @return void
     */
    public function importXlsx($filename);

    /**
     * To search company
     * @param array $validated validated results to search company
     * @return array list of matched company
     */
    public function searchCompany($validated);
}