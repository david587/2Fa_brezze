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


Route::get('/', function () {
    return view('auth.login');
})->name("login");

Route::get('/2faLogin', function () {
    return view('auth.2faLogin');
});

//normal login
Route::post("/authenticate",[authController::class,"authenticate"]);

//2fa start
Route::post("/login",[authController::class,"login"]);
Route::get('2fa', [App\Http\Controllers\TwoFAController::class, 'index'])->name('2fa.index');
Route::post('2fa', [App\Http\Controllers\TwoFAController::class, 'store'])->name('2fa.post');
Route::get('2fa/reset', [App\Http\Controllers\TwoFAController::class, 'resend'])->name('2fa.resend');
//2fa end

Route::middleware(['auth'])->group(function () {
    Route::post("/logout",[AuthController::class,"logout"])->name("logout");
    Route::get("/list",[companyController::class,"listCompanies"])->name("list");
    Route::get("/create",[companyController::class,"showCreate"]);
    Route::post("/create",[companyController::class,"createCompany"])->name("company.create");
    Route::get("/show/{id}",[companyController::class,"showCompany"])->name("company.showCompany");
    Route::get("/edit/{id}",[companyController::class,"editCompany"])->name("company.edit");
    Route::put("/update/{id}",[companyController::class,"updateCompany"])->name("company.update");
    Route::delete("/destroy/{id}",[companyController::class,"destroyCompany"])->name("company.destroy");

});
