<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\companyController;
use App\Http\Controllers\ProfileController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//2fa start
// Route::post("/login",[authController::class,"login"])->name("2fa.login");
Route::get('2fa', [App\Http\Controllers\TwoFAController::class, 'index'])->name('2fa.index');
Route::post('2fa', [App\Http\Controllers\TwoFAController::class, 'store'])->name('2fa.post');
Route::get('2fa/reset', [App\Http\Controllers\TwoFAController::class, 'resend'])->name('2fa.resend');
//2fa end

Route::middleware(['auth','2fa'])->group(function () {
    Route::get("/list",[companyController::class,"listCompanies"])->name("list");
    Route::get("/create",[companyController::class,"showCreate"])->name('create');
    Route::post("/create",[companyController::class,"createCompany"])->name("company.create");
    Route::get("/show/{company}", [CompanyController::class, "showCompany"])->name("company.showCompany");
    Route::get("/edit/{company}", [CompanyController::class, "editCompany"])->name("company.edit");
    Route::put("/update/{company}", [CompanyController::class, "updateCompany"])->name("company.update");
    Route::delete("/destroy/{company}", [CompanyController::class, "destroyCompany"])->name("company.destroy");

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
