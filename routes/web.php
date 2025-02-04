<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\admin\index;
use App\Http\Controllers\admin\Pages;
use App\Http\Controllers\admin\TestimonialController;
use App\Http\Controllers\admin\TeamController;

use App\Http\Controllers\admin\LanguagesController;

use App\Http\Controllers\admin\PortfolioController;
use App\Http\Controllers\admin\BrandController;






use App\Http\Controllers\admin\ContactController;

use App\Http\Controllers\admin\ServiceController;
use App\Http\Controllers\ContentPages;



use App\Http\Controllers\admin\Dashboard;


// Route::get('/', function () {
//     return view('welcome');
//     // return message();
// });

route::get('/',[ContentPages::class,'home_page']);
route::get('/about',[ContentPages::class,'about_page']);
route::get('/contact',[ContentPages::class,'contact_page']);

Route::post('/contact_us', [ContentPages::class, 'contact_store']);
Route::get('/services', [ContentPages::class, 'service_page']);

Route::get('/portfolios', [ContentPages::class, 'portfolio_page']);




route::get('/getportfolio/{id}',[ContentPages::class,'getportfolio']);


// Site main Pages



/*==============================Admin Routes =====================================*/
Route::controller(Index::class)->group(function () {
    Route::get('/admin/register', 'register');
    Route::post('/admin/register', 'store');
});

Route::get('/admin/login', [Index::class, 'admin_login'])->middleware('admin_logged_in');

//login form.
Route::post('/admin/login', [Index::class, 'login'])->middleware('admin_logged_in');
 
//logout.
Route::get('/admin/logout', [Index::class, 'logout']);

//dashboard


//forget Admin Passwords.
Route::get('admin/forgot-password', [Index::class, 'forgot_password'])->name('admin.forgot_password');
Route::post('admin/forgot-password', [Index::class, 'send_reset_link'])->name('admin.send_reset_link');
Route::get('admin/reset-password/{token}', [Index::class, 'showResetPasswordForm'])->name('password.reset');
Route::post('admin/submit-password', [Index::class, 'resetPassword'])->name('password.update');


//admin Auth Protected Routes.
// Route::middleware(['is_admin'])->group(function () {
//     Route::get('/admin/dashboard', [Dashboard::class, 'index']); //new controller Dashboard
//  });

// Route::get('/admin/dashboard', [Dashboard::class, 'index'])->middleware('is_admin');

Route::middleware(['is_admin'])->group(function () { 
    Route::get('/admin/dashboard', [Dashboard::class, 'index']);
Route::get('/admin/site_settings', [Dashboard::class, 'settings']);
Route::post('/admin/settings', [Dashboard::class, 'settings_update']);

//for All page shows.
Route::get('/admin/sitecontent', [Pages::class, 'index']);

//CMS

Route::match(['GET', 'POST'], '/admin/sitecontent/home', [Pages::class, 'home']);
Route::match(['GET', 'POST'], '/admin/sitecontent/about', [Pages::class, 'about']);
Route::match(['GET', 'POST'], '/admin/sitecontent/contact', [Pages::class, 'contact']);
Route::match(['GET', 'POST'], '/admin/sitecontent/services', [Pages::class, 'services']);

Route::match(['GET', 'POST'], '/admin/sitecontent/portfolios', [Pages::class, 'portfolios']);











//cruds. Testimonials.
Route::get('/admin/testimonials', [TestimonialController::class, 'index']);
Route::match(['GET', 'POST'], '/admin/testimonials/add', [TestimonialController::class, 'add']);

Route::match(['GET', 'POST'], '/admin/testimonials/edit/{id}', [TestimonialController::class, 'edit']);
Route::match(['GET', 'POST'], '/admin/testimonials/delete/{id}', [TestimonialController::class, 'delete']);

//Team
//Team
Route::get('/admin/teams', [TeamController::class, 'index']);
Route::match(['GET', 'POST'], '/admin/teams/add', [TeamController::class, 'add']);

Route::match(['GET', 'POST'], '/admin/teams/edit/{id}', [TeamController::class, 'edit']);
Route::match(['GET', 'POST'], '/admin/teams/delete/{id}', [TeamController::class, 'delete']);


//languages.
Route::get('/admin/langs', [LanguagesController::class, 'index']);
Route::match(['GET', 'POST'], '/admin/langs/add', [LanguagesController::class, 'add']);

Route::match(['GET', 'POST'], '/admin/langs/edit/{id}', [LanguagesController::class, 'edit']);
Route::match(['GET', 'POST'], '/admin/langs/delete/{id}', [LanguagesController::class, 'delete']);

// servics

Route::get('/admin/services', [ServiceController::class, 'index']);
Route::match(['GET', 'POST'], '/admin/services/add', [ServiceController::class, 'add']);
Route::match(['GET', 'POST'], '/admin/services/edit/{id}', [ServiceController::class, 'edit']);

//portfolio

Route::get('/admin/portfolios', [PortfolioController::class, 'index']);
Route::match(['GET', 'POST'], '/admin/portfolios/add', [PortfolioController::class, 'add']);
Route::match(['GET', 'POST'], '/admin/portfolios/edit/{id}', [PortfolioController::class, 'edit']);
Route::match(['GET', 'POST'], '/admin/portfolios/delete/{id}', [PortfolioController::class, 'delete']);

//brands
Route::get('/admin/brands', [BrandController::class, 'index']);
Route::match(['GET', 'POST'], '/admin/brands/add', [BrandController::class, 'add']);
Route::match(['GET', 'POST'], '/admin/brands/edit/{id}', [BrandController::class, 'edit']);
Route::match(['GET', 'POST'], '/admin/brands/delete/{id}', [BrandController::class, 'delete']);



Route::match(['GET', 'POST'], '/admin/services/delete/{id}', [ServiceController::class, 'delete']);

//contact.

Route::get('/admin/contact', [ContactController::class, 'index']);
Route::match(['GET', 'POST'], '/admin/contact/view/{id}', [ContactController::class, 'view']);
Route::match(['GET', 'POST'], '/admin/contact/delete/{id}', [ContactController::class, 'delete']);



});