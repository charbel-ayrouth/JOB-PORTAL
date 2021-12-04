<?php

use App\Models\country;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Auth\RegisterController;

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

// Route::resource('admin', [DashboardController::class]);
Route::get('/admin/dashboard', [DashboardController::class, 'index']);

Route::get('/Sign-In', [AuthController::class, 'index'])->name('LoginPage');

Route::get('/Sign-In/Recruiter', [AuthController::class, 'indexRecruiter'])->name('LoginPageRecruiter');
Route::get('/Sign-In/Seeker', [AuthController::class, 'indexSeeker'])->name('LoginPageSeeker');
Route::post('/Sign-In', [AuthController::class, 'Login'])->name('LoginPage');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/verify', [AuthController::class, 'VerifyUser'])->name('verify.user');
Route::get('/logout', [AuthController::class, 'Logout']);
Route::get('/', function () {
    return view('LandingPage.LandingScreen');
})->name('home');
Route::get('/JobseekerAPP', function () {
    return view('Jobseeker.JobseekerApp');
});

Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/register', function () {
    $countries = country::all();
    return view('Auth.signUpScreen')->with('countries', $countries);
});
Route::get('/verify', [AuthController::class, 'VerifyUser'])->name('verify.user');
// Auth::routes();
Route::post('/Sign-In', [AuthController::class, 'Login']);
