<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DownloadFilesController;
use App\Http\Controllers\JobProviderController;
use App\Http\Controllers\JobSeekerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\ResultsController;
use App\Http\Controllers\TestController;

Route::get('/', function () {
    return view('LandingPage.LandingScreen');
})->name('home');
Route::get('/logout', [AuthController::class, 'Logout']);
Route::post('/Sign-In', [AuthController::class, 'Login'])->name('LoginPage');
Route::get('/Sign-In/Recruiter', [AuthController::class, 'indexRecruiter'])->name('LoginPageRecruiter');
Route::get('/Sign-In/Seeker', [AuthController::class, 'indexSeeker'])->name('LoginPageSeeker');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/verify', [AuthController::class, 'VerifyUser'])->name('verify.user');
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'index'])->name('password.reset');
Route::post('/forgot-password', [ResetPasswordController::class, 'requestReset'])->name('password.email');
Route::post('/reset-password', [ResetPasswordController::class, 'handleReset'])->name('password.update');
Route::get('/downloadCV/{path}', [DownloadFilesController::class, 'downloadCV']);
Route::get('/downloadCoverLetter/{path}', [DownloadFilesController::class, 'downloadCoverLetter']);

Route::group(['middleware' => 'CheckRole:JobProvider'], function () {
    Route::get('/JobProviderApp', [JobProviderController::class, 'index'])->name('JobProviderApp');
    Route::post('/JobProviderApp', [JobProviderController::class, 'createApplication']);
    Route::get('/HomeJobProvider', [JobProviderController::class, 'home'])->name('JobProviderHome');
    Route::get('/jphome', [JobProviderController::class, 'displayjp'])->name('jpHome');
    route::get('/JobseekerDetails/{jid}', [JobProviderController::class, 'seekerDetails'])->name('jobSeekerDetails');
    Route::post('/JobProviderEmail', [JobProviderController::class, 'sendEmail'])->name('JobProviderEmail');
    Route::post('/searchSeekers', [JobProviderController::class, 'search']);

    Route::get('/jobtest/{id}/categories', [CategoriesController::class, 'index']);


    //new
    // Route::get('/Quiz/{uid}/{job_id}', [TestController::class, 'index'])->name('Quiz');
    // Route::post('/addQuiz/{uid}/{job_id}', [TestController::class, 'createQuiz']);
    // Route::get('/question/{uid}/{job_id}/{quiz_id}', [TestController::class, 'index'])->name('Quiz');
    Route::resource('/category',[CategoriesController::class]);
    

    Route::get('/question/{}', function () {
        return view('JobProvider.question');
    });
    //
});


Route::group(['middleware' => 'auth', 'middleware' => 'CheckRole:JobSeeker'], function () {
    Route::get('/homepagejs', [JobSeekerController::class, 'display'])->name('homepage_js');
    Route::get('/JobseekerAPP', [JobSeekerController::class, 'index'])->name('JobSeekerApp');
    Route::post('/search', [JobSeekerController::class, 'searchjob']);
    Route::post('/JobseekerAPP', [JobSeekerController::class, 'createApplication']);
    Route::post('/JobSeekerEmail', [JobSeekerController::class, 'sendEmail'])->name('JobSeekerEmail');

    Route::get('/test', [TestController::class, 'index'])->name('test');
    Route::post('/test', [TestController::class, 'store']);

    Route::get('/result/{result_id}', [ResultsController::class, 'show'])->name('result.show');
    Route::get('/send/{result_id}', [ResultsController::class, 'send'])->name('result.send');
});

Route::group(['middleware' => 'auth', 'middleware' => 'CheckRole:admin'], function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('users.index');
    Route::get('/admin/dashboard/{id}', [DashboardController::class, 'show'])->name('users.show');
    Route::get('/admin/dashboard/{id}/edit', [DashboardController::class, 'edit'])->name('users.edit');
    Route::put('/admin/dashboard/{id}', [DashboardController::class, 'update'])->name('users.update');
    Route::delete('/admin/dashboard/{id}', [DashboardController::class, 'destroy'])->name('users.destroy');
});
Route::group(['middleware' => 'auth'], function () {
    Route::get('/profile/{id}', [ProfileController::class, 'index'])->name('profile');
    Route::get('/profile/{id}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/{id}/edit', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/{id}/picture', [ProfileController::class, 'profile']);

    Route::get('/profile/{id}/edit/job/{jid}', [ProfileController::class, 'jobEdit']);
    Route::put('/profile/{id}/edit/job/{jid}', [ProfileController::class, 'jobUpdate']);

    Route::get('/profile/{id}/create/job', [ProfileController::class, 'jobCreate']);
    Route::post('/profile/{id}/create/job', [ProfileController::class, 'jobStore']);

    Route::delete('/profile/{id}/delete/job/{jid}', [ProfileController::class, 'deleteJob']);

    Route::get('/JobDetail/{id}', [JobSeekerController::class, 'jobdetail'])->name('JobDetail');
});


// Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('users.index');
// Route::get('/admin/dashboard/{id}', [DashboardController::class, 'show'])->name('users.show');
// Route::get('/admin/dashboard/{id}/edit', [DashboardController::class, 'edit'])->name('users.edit');
// Route::put('/admin/dashboard/{id}', [DashboardController::class, 'update'])->name('users.update');
// Route::delete('/admin/dashboard/{id}', [DashboardController::class, 'destroy'])->name('users.destroy');

// Route::get('/reset-password/{token}', [ResetPasswordController::class, 'index'])->middleware('guest')->name('password.reset');
// Route::post('/forgot-password', [ResetPasswordController::class, 'requestReset'])->middleware('guest')->name('password.email');
// Route::post('/reset-password', [ResetPasswordController::class, 'handleReset'])->middleware('guest')->name('password.update');

// //
// //
// Route::post('/Sign-In', [AuthController::class, 'Login'])->name('LoginPage');

// Route::get('/Sign-In/Recruiter', [AuthController::class, 'indexRecruiter'])->name('LoginPageRecruiter');
// Route::get('/Sign-In/Seeker', [AuthController::class, 'indexSeeker'])->name('LoginPageSeeker');
// Route::post('/register', [AuthController::class, 'register']);
// Route::get('/verify', [AuthController::class, 'VerifyUser'])->name('verify.user');
// Route::get('/logout', [AuthController::class, 'Logout']);
// Route::get('/', function () {
//     return view('LandingPage.LandingScreen');
// })->name('home');

// Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
// Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
// Route::put('/profile/edit', [ProfileController::class, 'update']);
// Route::post('/profile/picture', [ProfileController::class, 'profile']);

// Route::get('/JobseekerAPP', [JobSeekerController::class, 'index'])->name('JobSeekerApp');
// Route::post('/JobseekerAPP', [JobSeekerController::class, 'createApplication']);


/*Route::get('/JShomepage', function () {
    return view('Jobseeker.Homepage');
})->name('homepage_js');*/
// Route::get('/JShomepage', [JobSeekerController::class, 'display'])->name('homepage_js');

// Route::post('/search', [JobSeekerController::class, 'searchjob']);
// Route::get('/JobProviderApp', [JobProviderController::class, 'index'])->name('JobProviderApp');
// Route::post('/JobProviderApp', [JobProviderController::class, 'createApplication']);
// Route::get('/HomeJobProvider',[JobProviderController::class, 'home'])->name('JobProviderHome');

//test
/*Route::get('/addQuiz/{uid}/{job_id}',[TestController::class, 'index'])->name('Quiz');
Route::get('/addQuiz/{uid}/{job_id}',[TestController::class, 'createQuiz']);*/


//test
Route::get('/options', function () {
    return view('JobProvider.option');
});
