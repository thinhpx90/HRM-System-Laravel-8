<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\EmployeeController;

use App\Http\Controllers\EmployeeDetailController;

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

Route::get('/', function () {
    return view('home');
});

// Compnay route
Route::resource('/company', CompanyController::class);
Route::get('company/{id}/delete', [CompanyController::class,'destroy']);

// Department route
Route::resource('/department', DepartmentController::class);
Route::get('department/{id}/delete', [DepartmentController::class,'destroy']);
Route::get('department/status/{status}/{id}', [DepartmentController::class, 'status']);

// Designation route
Route::resource('/designation', DesignationController::class);
Route::get('designation/{id}/delete', [DesignationController::class,'destroy']);
Route::get('designation/status/{status}/{id}', [DesignationController::class, 'status']);

// Employee route
Route::resource('/employee', EmployeeController::class);
Route::get('employee/{id}/delete', [EmployeeController::class,'destroy']);
Route::get('employee/status/{status}/{id}', [EmployeeController::class, 'status']);

// Employee Details
Route::get('company/{company_id}/employee', [EmployeeDetailController::class, 'company_employee']);
Route::get('department/{department_id}/employee', [EmployeeDetailController::class, 'department_employee']);
Route::get('designation/{designation_id}/employee', [EmployeeDetailController::class, 'designation_employee']);

Route::get('date/filter/employee', [EmployeeDetailController::class, 'date_employee']);
Route::get('salary/filter/employee', [EmployeeDetailController::class, 'salary_employee']);
