<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JobProviderController;
use App\Http\Controllers\JobSeekerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResetPasswordController;


Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('users.index');
Route::get('/admin/dashboard/{id}', [DashboardController::class, 'show'])->name('users.show');
Route::get('/admin/dashboard/{id}/edit', [DashboardController::class, 'edit'])->name('users.edit');
Route::put('/admin/dashboard/{id}', [DashboardController::class, 'update'])->name('users.update');
Route::delete('/admin/dashboard/{id}', [DashboardController::class, 'destroy'])->name('users.destroy');

Route::get('/reset-password/{token}', [ResetPasswordController::class, 'index'])->middleware('guest')->name('password.reset');
Route::post('/forgot-password', [ResetPasswordController::class, 'requestReset'])->middleware('guest')->name('password.email');
Route::post('/reset-password', [ResetPasswordController::class, 'handleReset'])->middleware('guest')->name('password.update');

//
//
Route::post('/Sign-In', [AuthController::class, 'Login'])->name('LoginPage');

Route::get('/Sign-In/Recruiter', [AuthController::class, 'indexRecruiter'])->name('LoginPageRecruiter');
Route::get('/Sign-In/Seeker', [AuthController::class, 'indexSeeker'])->name('LoginPageSeeker');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/verify', [AuthController::class, 'VerifyUser'])->name('verify.user');
Route::get('/logout', [AuthController::class, 'Logout']);
Route::get('/', function () {
    return view('LandingPage.LandingScreen');
})->name('home');

Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::put('/profile/edit', [ProfileController::class, 'update']);
Route::post('/profile/picture', [ProfileController::class, 'profile']);

Route::get('/JobseekerAPP', [JobSeekerController::class, 'index'])->name('JobSeekerApp');
Route::post('/JobseekerAPP', [JobSeekerController::class, 'createApplication']);


/*Route::get('/JShomepage', function () {
    return view('Jobseeker.Homepage');
})->name('homepage_js');*/
Route::get('/JShomepage', [JobSeekerController::class, 'display'])->name('homepage_js');

Route::get('/search', [JobSeekerController::class, 'searchjob']);
Route::get('/JobProviderApp', [JobProviderController::class, 'index'])->name('JobProviderApp');
Route::post('/JobProviderApp', [JobProviderController::class, 'createApplication']);
Route::get('/HomeJobProvider', [JobProviderController::class, 'home'])->name('JobProviderHome');
