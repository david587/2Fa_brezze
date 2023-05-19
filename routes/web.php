<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authController;
use App\Http\Controllers\companyController;

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
//todo:
///list route to visualize in table
//list companies
//test auth
//protect routes
//detailed list with passed id
//add in /list
//edit-update,dlete in companyblade
//mobil responsivity
//2fa login

Route::get('/', function () {
    return view('auth.login');
})->name("login");

Route::post("/authenticate",[authController::class,"authenticate"]);

Route::middleware(['auth'])->group(function () {
    Route::post("/logout",[AuthController::class,"logout"])->name("logout");
    Route::get("/list",[companyController::class,"listCompanies"])->name("list");
    Route::get("/show/{id}",[companyController::class,"showCompany"])->name("company.showCompany");
    Route::get("/edit/{id}",[companyController::class,"editCompany"])->name("company.edit");
    Route::put("/update/{id}",[companyController::class,"updateCompany"])->name("company.update");
    Route::delete("/destroy/{id}",[companyController::class,"destroyCompany"])->name("company.destroy");

});
