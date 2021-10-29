<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [EmployeeController::class, 'showEmployeeList']);
Route::post('/employee/add', [EmployeeController::class, 'addEmployee']);
Route::delete('/employee/delete/{id}', [EmployeeController::class, 'deleteEmployee']);

Route::get('/company', [CompanyController::class, 'showCompanyList']);
Route::post('/company/add', [CompanyController::class, 'addCompany']);
Route::delete('/company/delete/{id}', [CompanyController::class, 'deleteCompany']);