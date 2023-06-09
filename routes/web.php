<?php

use App\Http\Controllers\InvoiceController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('/home', [InvoiceController::class, 'index']);
Route::get('/create-invoice', [InvoiceController::class, 'create']);
Route::get('/update-invoice/{invoiceId}', [InvoiceController::class, 'update']);
Route::get('/delete-invoice/{invoiceId}', [InvoiceController::class, 'destroy']);



