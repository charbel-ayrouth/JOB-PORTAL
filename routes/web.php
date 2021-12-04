<?php

use App\Http\Controllers\AuthController;
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

Route::get('/Sign-In/Recruiter',[AuthController::class,'indexRecruiter'])->name('LoginPageRecruiter');
Route::get('/Sign-In/Seeker',[AuthController::class,'indexSeeker'])->name('LoginPageSeeker');
Route::post('/Sign-In',[AuthController::class,'Login'])->name('LoginPage');
Route::post('/register',[AuthController::class,'register'])->name('register');
Route::get('/verify',[AuthController::class,'VerifyUser'])->name('verify.user');
Route::get('/logout',[AuthController::class,'Logout']);
Route::get('/',function(){
    return view('LandingPage.LandingScreen');
})->name('home');
Route::get('/JobseekerAPP', function () {
    return view('Jobseeker.JobseekerApp');
})->name('JobSeekerApp');
