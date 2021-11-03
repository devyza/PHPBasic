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

/* Main Route */
Route::get('/', function() {
    return redirect()->route('employee');
});

/* Routes for Employee */
Route::get('/employee', [EmployeeController::class, 'showEmployeeList'])->name('employee');
Route::post('/employee/add', [EmployeeController::class, 'addEmployee'])->name('employee.add');
Route::get('/employee/edit/{id}', [EmployeeController::class, 'showEmployeeEditView'])->name('employee.edit');
Route::post('/employee/edit/{id}', [EmployeeController::class, 'submitEmployeeEditView'])->name('employee.edit.submit');
Route::delete('/employee/delete/{id}', [EmployeeController::class, 'deleteEmployee'])->name('employee.delete');
Route::get('/employee/mail/{id}', [EmployeeController::class, 'showEmployeeMailView'])->name('employee.mail');
Route::post('/employee/mail/{id}/submit', [EmployeeController::class, 'submitMailSendView'])->name('employee.mail.submit');

/* Routes for Company */
Route::get('/company', [CompanyController::class, 'showCompanyList'])->name('company');
Route::post('/company/add', [CompanyController::class, 'addCompany'])->name('company.add');
Route::get('/company/edit/{id}', [CompanyController::class, 'showCompanyEditView'])->name('company.edit');
Route::post('/company/edit/{id}', [CompanyController::class, 'submitCompanyEditView'])->name('company.edit.submit');
Route::delete('/company/delete/{id}', [CompanyController::class, 'deleteCompany'])->name('company.delete');