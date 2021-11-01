<?php

namespace App\Dao\Company;

use App\Contracts\Dao\Company\CompanyDaoInterface;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $companies = DB::select(
            DB::raw("SELECT id, name, country, deleted_at FROM companies ORDER BY name;")
        );
        return $companies;
    }

    /**
     * To get company by id
     * @param string $id post id
     * @return Object company 
     */
    public function getCompanyById($companyId)
    {
        // return Company::find($companyId);
        $company = DB::select(
            DB::raw("SELECT id, name, country FROM companies WHERE id=" . $companyId)
        );
        return $company[0];
    }

    /**
     * To insert company into datbase
     * @param Request $request request with values
     * @return void
     */
    public function insertCompany(Company $company)
    {
        $company->save();
    }

    /**
     * To insert company into datbase
     * @param Request $request request with values
     * @return void
     */
    public function editCompanyById(Request $request, $companyId)
    {
        $company = $this->getCompanyById($companyId);
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