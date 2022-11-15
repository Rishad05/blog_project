<?php

use App\Http\Controllers\Backend\AdminLoginController;
use App\Http\Controllers\Backend\AuthorDashboardController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\BlogListController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\UserManagementController;
use App\Http\Controllers\Frontend\BlogDetailsController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\UserLoginController;
use App\Http\Controllers\Frontend\UserLoginRegistrationController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
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

// Route::get('/', function () {
//     return view('frontend.Main');
// });


Route::group(['prefix' => 'author'], function () {
    Route::group(['middleware' => 'author-auth'], function () {

        Route::get('/blogs', [BlogController::class, 'blog'])->name('blog');
        Route::get('/blog/create', [BlogController::class, 'blogCreate'])->name('blogCreate');
        Route::post('/blogs', [BlogController::class, 'create'])->name('blog.create');
        Route::get('/blogs/delete/{id}', [BlogController::class, 'delete'])->name('blog.delete');
        Route::get('/blogs/edit/{id}', [BlogController::class, 'editBlog'])->name('blog.edit');
        Route::put('/blogs/update/{id}', [BlogController::class, 'updateBlog'])->name('blog.update');
        // Route::post('/blog/comment/{id}',[BlogDetailsController::class, 'comments'])->name('create.comment');

    });
});




Route::get('/authorDashboard', [AuthorDashboardController::class, 'authorDashboard'])->name('authorDashboard')->middleware(['verified']);


Route::get('/email/verify', function () {
    return view('frontend.layouts.verify-email');
})->name('verification.notice');



Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');



Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect()->route('authorDashboard');
})->middleware(['author-auth', 'signed'])->name('verification.verify');










Route::get('/', [HomeController::class, 'homepage'])->name('homepage');
Route::get('/homepage', [HomeController::class, 'homepage'])->name('homepage');
// Route::get('blog/search',[HomeController::class,'searchEmployee'])->name('employee.search');
Route::get('/blogDetails/{blog:slug}', [BlogDetailsController::class, 'blogDetails'])->name('blog.details');


Route::get('/authorLogin', [UserLoginController::class, 'authorLogin'])->name('authorLogin');
Route::post('/authorLogin', [UserLoginController::class, 'userLogin'])->name('userLogin');
Route::get('/authorRegistration', [UserLoginRegistrationController::class, 'userLoginRegistration'])->name('authorRegistration');
Route::post('/authorRegistration', [UserLoginRegistrationController::class, 'userRegistration'])->name('userRegistration');
Route::get('/userLogout', [UserLoginController::class, 'userLogout'])->name('userLogout');




//admin panel
Route::group(['prefix' => 'admin'], function () {
    Route::group(['middleware' => 'admin-auth'], function () {
        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
        Route::get('/blogList', [BlogListController::class, 'blogList'])->name('blogList');
        Route::get('/blogList/{id}/{status}', [BlogListController::class, 'statusUpdate'])->name('statusUpdate');
        Route::get('/userManage', [UserManagementController::class, 'userManagement'])->name('userManagement');
        Route::post('/userManage', [UserManagementController::class, 'create'])->name('user.create');
        Route::get('/user/delete/{id}', [UserManagementController::class, 'delete'])->name('user.delete');
        Route::get('/user/edit/{id}', [UserManagementController::class, 'editUser'])->name('user.edit');
        Route::put('/user/update/{id}', [UserManagementController::class, 'updateUser'])->name('user.update');
    });
});
Route::get('/login', [AdminLoginController::class, 'adminLogin'])->name('login');
Route::post('/login', [AdminLoginController::class, 'accessLogin'])->name('accessLogin.create');
Route::get('/logout', [AdminLoginController::class, 'logout'])->name('logout');
