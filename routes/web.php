<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminDailyPost;
use App\Http\Controllers\AdminGeneralPost;
use App\Http\Controllers\AdminMonthlylyPost;
use App\Http\Controllers\AdminweeklyPost;
use App\Http\Controllers\AfterPregnetController;
use App\Http\Controllers\AllUserInforController;
use App\Http\Controllers\BabyBornController;
use App\Http\Controllers\BeforPregnetController;
use App\Http\Controllers\DPostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\MPostController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserInforController;
use App\Http\Controllers\WPostController;
use Illuminate\Support\Facades\Auth;
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
//     return view('welcome');
// });

Auth::routes();

Route::get('/blog/{slug}/en', [LanguageController::class,'gen']);
Route::get('/blog/{slug}/si', [LanguageController::class,'gsi']);
Route::get('/dblog/{slug}/en', [LanguageController::class,'den']);
Route::get('/dblog/{slug}/si', [LanguageController::class,'dsi']);
Route::get('/wblog/{slug}/en', [LanguageController::class,'wen']);
Route::get('/wblog/{slug}/si', [LanguageController::class,'wsi']);
Route::get('/mblog/{slug}/en', [LanguageController::class,'men']);
Route::get('/mblog/{slug}/si', [LanguageController::class,'msi']);

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/', [PagesController::class, 'index']);
Route::resource('/blog', PostController::class);
Route::post('/blogupload', [PostController::class, 'upload']);
Route::resource('/dblog', DPostController::class)->middleware('auth');
Route::post('/dblogupload', [DPostController::class, 'upload']);
Route::resource('/wblog', WPostController::class)->middleware('auth');
Route::post('/wblogupload', [WPostController::class, 'upload']);
Route::resource('/mblog', MPostController::class)->middleware('auth');
Route::post('/mblogupload', [MPostController::class, 'upload']);

Route::get('/admin', [AdminController::class, 'dashboard']);

Route::resource('/general', AdminGeneralPost::class);
Route::resource('/daily', AdminDailyPost::class);
Route::resource('/weekly', AdminweeklyPost::class);
Route::resource('/monthly', AdminMonthlylyPost::class);

Route::resource('/bb', BabyBornController::class);
Route::resource('/ap', AfterPregnetController::class);
Route::resource('/bp', BeforPregnetController::class);


// Route::get('/profile', function () {
//     return view('admin.userprofile');
// });

Route::resource('/users', UserInforController::class);
Route::resource('/allusers', AllUserInforController::class);

Route::resource('/profile', ProfileController::class);
// Route::get('/profile', [TestController::class, 'show']);

Route::get('mobile-register', [TestController::class, 'mobileRegister']);








