<?php

namespace App\Http\Controllers;

use App\Contracts\Services\Company\CompanyServiceInterface;
use Illuminate\Http\Request;

/**
 * Controller class for Company
 */
class CompanyController extends Controller
{

    /**
     * Attribute of company service
     */
    protected $companyService;

    /**
     * Class Constructor
     * @param CompanyServiceInterface
     */
    public function __construct(CompanyServiceInterface $companyServiceInterface)
    {
        $this->companyService = $companyServiceInterface;
    }

    /**
     * To show company list
     * 
     * @return View company list
     */
    public function showCompanyList()
    {
        $companyList = $this->companyService->getCompanyList();
        return view('companies.add', compact('companyList'));
    }

    /**
     * To add company into datbase
     * @param Request $request values from request
     * @return void
     */
    public function addCompany(Request $request)
    {
        $this->companyService->addCompany($request);
        return redirect('company');
    }

    /**
     * To add company into datbase
     * @param string $companyId company id
     * @return View
     */
    public function showCompanyEditView($companyId)
    {
        $company = $this->companyService->getCompanyById($companyId);
        return view('companies.edit', compact('company'));
    }

    /**
     * To add company into datbase
     * @param Request $request request with values
     * @param string $companyId company id
     * @return void
     */
    public function submitCompanyEditView(Request $request, $companyId)
    {
        $this->companyService->editCompanyById($request, $companyId);
        return redirect('company');
    }

    /**
     * To delete company by id
     * @param string $company company id
     * @return void
     */
    public function deleteCompany($id)
    {
        $this->companyService->deleteCompany($id);
        return redirect('company');
    }

    /**
     * To export company information in XLXS format
     */
    public function exportXlxs()
    {
        $this->companyService->exportXlxs();
    }
}
