<?php

namespace App\Http\Controllers;

use App\Contracts\Services\Company\CompanyServiceInterface;

/**
 * Controller class for Company
 */
class CompanyController extends Controller
{

    /**
     * Company Service
     */
    protected $companyService;

    /**
     * Class Constructor
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
        return view('company', compact('companyList'));
    }
}
