<?php

namespace App\Dao\Company;

use App\Contracts\Dao\Company\CompanyDaoInterface;
use App\Models\Company;
use Illuminate\Http\Request;

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

    /**
     * To get company by id
     * @param string $id post id
     * @return Object company 
     */
    public function getCompanyById($companyId)
    {
        return Company::find($companyId);
    }

    /**
     * To insert company into datbase
     * @param Request $request request with values
     * @return void
     */
    public function insertCompany(Request $request)
    {
        $company = new Company;
        $company->name = $request->name;
        $company->country = $request->country;
        $company->save();
    }

    /**
     * To insert company into datbase
     * @param Request $request request with values
     * @return void
     */
    public function editCompanyById(Request $request, $companyId)
    {
        $company = Company::find($companyId);
        $company->name = $request->name;
        $company->country = $request->country;
        $company->save();
    }

    /**
     * To delete company by id
     * @param string $company company id
     * @return void
     */
    public function deleteCompany($id)
    {
        Company::findOrFail($id)->delete();
    }
}