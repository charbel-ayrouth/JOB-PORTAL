<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('users.index');
Route::get('/admin/dashboard/{id}', [DashboardController::class, 'show'])->name('users.show');
Route::put('/admin/dashboard/{id}/edit', [DashboardController::class, 'edit'])->name('users.edit');
Route::delete('/admin/dashboard/{id}', [DashboardController::class, 'destroy'])->name('users.delete');

Route::get('/Sign-In', [AuthController::class, 'index'])->name('LoginPage');
Route::post('/Sign-In', [AuthController::class, 'Login']);

Route::get('/Sign-In/Recruiter', [AuthController::class, 'indexRecruiter'])->name('LoginPageRecruiter');
Route::get('/Sign-In/Seeker', [AuthController::class, 'indexSeeker'])->name('LoginPageSeeker');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/verify', [AuthController::class, 'VerifyUser'])->name('verify.user');
Route::get('/logout', [AuthController::class, 'Logout']);
Route::get('/', function () {
    return view('LandingPage.LandingScreen');
})->name('home');
Route::get('/JobseekerAPP', function () {
    return view('Jobseeker.JobseekerApp');
})->name('JobSeekerApp');
