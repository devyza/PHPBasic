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

    /**
     * To get company by id
     * @param string companyId company Id
     * @return Object company object
     */
    public function getCompanyById($companyId);

    /**
     * To add company into datbase
     * @param array $validated validated values from request
     * @return void
     */
    public function addCompany($validated);

    /**
     * To edit employee by id
     * @param array $validated validated data from request
     * @param string $companyId company id
     * @return void
     */
    public function editCompanyById($validated, $companyId);

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
}