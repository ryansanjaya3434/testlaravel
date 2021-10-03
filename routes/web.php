<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\PdfController;

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


Route::get('companies', [CompanyController::class, 'index']);
//Route::post('company', [CompanyController::class, 'store']);
//Route::put('company', [CompanyController::class, 'update']);
Route::delete('company/{company_id}', [CompanyController::class, 'destroy']);

Route::get('/', function () {
    return view('home');
});
Auth::routes();
Route::resource('company', CompanyController::class)->middleware('auth');
Route::resource('employee', EmployeeController::class)->middleware('auth');
Route::get('/downloadPDF/{id}','App\Http\Controllers\CompanyController@downloadPDF');


