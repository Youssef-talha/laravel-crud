<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController; // InvoiceController is controller name

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
    return view('welcome');
});

Route::get('/employees', [EmployeeController::class, 'index']);
Route::get('/employees/create', [EmployeeController::class, 'create']);
Route::post('/employees/store', [EmployeeController::class, 'store']);
Route::delete('/employees/delete/{id}', [EmployeeController::class, 'destroy']);
Route::get('/employees/edit/{id}', [EmployeeController::class, 'edit']);
Route::post('/employees/update/{id}', [EmployeeController::class, 'update']);

Route::get('/employees/{file_name}', [EmployeeController::class, 'downloadFile']);
Route::get('/images', [EmployeeController::class, 'showAllFiles']);
Route::get('/getFile/{path}', [EmployeeController::class, 'getFile']);


