<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AuthController;
use App\Models\country;
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

Route::get('/Sign-In',[AuthController::class,'index'])->name('LoginPage');
Route::get('/',function(){
    return view('LandingPage.LandingScreen');
});


Route::get('/JobseekerAPP', function () {
    return view('Jobseeker.JobseekerApp');
});
Route::post('/register',[AuthController::class,'register'])->name('register');
Route::get('/register',function(){
    $countries = country::all();
    return view('Auth.signUpScreen')->with('countries',$countries);
});
Route::get('/verify',[AuthController::class,'VerifyUser'])->name('verify.user');
// Auth::routes();
Route::post('/Sign-In',[AuthController::class,'Login']);
