<?php

use App\Http\Controllers\EmployeeAPIController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('employee/list', [EmployeeAPIController::class, 'getEmployeeList'])->name('employee.get');
Route::post('employee/list/add/', [EmployeeAPIController::class, 'addEmployee']);
Route::post('employee/list/edit/', [EmployeeAPIController::class, 'editEmployee']);
Route::get('/employee/list/delete/{id}', [EmployeeAPIController::class, 'deleteEmployee']);

Route::get('api-view/employee', function(){
    return view('employees.api.list');
})->name('employee.list');