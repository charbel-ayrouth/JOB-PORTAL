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
//old
// Route::resource('admin', [DashboardController::class]);
/*Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('users.index');
Route::get('/admin/dashboard/{id}', [DashboardController::class, 'show'])->name('users.show');
Route::get('/admin/dashboard/{id}/edit', [DashboardController::class, 'edit'])->name('users.edit');
Route::delete('/admin/dashboard/{id}', [DashboardController::class, 'destroy'])->name('users.delete');

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
Route::post('/register',[AuthController::class,'register'])->name('register');
Route::get('/register',function(){
    $countries = country::all();
    return view('Auth.signUpScreen')->with('countries',$countries);
});
Route::get('/verify',[AuthController::class,'VerifyUser'])->name('verify.user');
// Auth::routes();
Route::post('/Sign-In',[AuthController::class,'Login']);

Route::get('/JobproviderAPP', function () {
    return view('JobProvider.JobProviderApp');
});
})->name('JobSeekerApp');*/


//last update
// Route::resource('admin', [DashboardController::class]);
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('users.index');
Route::get('/admin/dashboard/{id}', [DashboardController::class, 'show'])->name('users.show');
Route::get('/admin/dashboard/{id}/edit', [DashboardController::class, 'edit'])->name('users.edit');
Route::delete('/admin/dashboard/{id}', [DashboardController::class, 'destroy'])->name('users.delete');

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
})->name('JobSeekerApp');

