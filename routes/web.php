<?php

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

Auth::routes();

Route::get('/', function () {
    return redirect('/login');
});

//verification routes
Route::get('/email/verify', [App\Http\Controllers\Auth\VerificationController::class, 'show'])->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', [App\Http\Controllers\Auth\VerificationController::class, 'verify'])->name('verification.verify')->middleware(['signed']);
Route::post('/email/resend', [App\Http\Controllers\Auth\VerificationController::class, 'resend'])->name('verification.resend');

//social media register routes start
Route::get('login/{provider}', [App\Http\Controllers\SocialauthController::class, 'redirect']);
Route::get('login/{provider}/callback', [App\Http\Controllers\SocialauthController::class, 'Callback']);
//Social media register routes ends

//only user can access
Route::group(['middleware' => ['auth', 'verified', 'user.type:user']], function () {
    Route::get('/prescription', [App\Http\Controllers\PrescriptionController::class, 'createPrescription'])->name('create.prescription');
    Route::get('/quotations', [App\Http\Controllers\PrescriptionController::class, 'getQuotations'])->name('quotations');
    Route::get('/quotation/{id}', [App\Http\Controllers\PrescriptionController::class, 'viewQuotation'])->name('quotation.view');
});

//only pharmacy can access
Route::group(['middleware' => ['auth', 'verified', 'user.type:pharmacy']], function () {
    Route::get('/prescriptions', [App\Http\Controllers\PrescriptionController::class, 'getPrescriptions'])->name('prescriptions');
    Route::get('/prescription/{id}/quotation/create', [App\Http\Controllers\PrescriptionController::class, 'createQuotation'])->name('quotation.create');
});

//both user can access
Route::group(['middleware' => ['auth', 'verified', 'user.type:user,pharmacy']], function () {
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
