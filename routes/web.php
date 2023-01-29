<?php

use Illuminate\Support\Facades\Route;

//Models
use App\Models\User;

//Admin
use App\Http\Controllers\AdminCategoriesController;
use App\Http\Controllers\AdminCompetenciesController;
use App\Http\Controllers\AdminEducationsController;
use App\Http\Controllers\AdminNotifiesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;


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

Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
//Route Register
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

//Route Login
Route::get('/login-admin', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login-admin', [LoginController::class, 'authenticate']);

//Route Logout
Route::post('/logout', [LoginController::class, 'logout']);

//Route login dashboard
Route::get('/admin', function(){
    return view('admin.index');
})->middleware('auth');

//Route Admin Category
Route::resource('/admin/categories', AdminCategoriesController::class)->middleware('admin');

//Route Admin Competency
Route::resource('/admin/competencies', AdminCompetenciesController::class)->middleware('admin');
Route::get('/admin/competencies/checkSlug', [AdminCompetenciesController::class, 'checkSlug'])->middleware('admin');

//Route Admin Educations
Route::resource('/admin/educations', AdminEducationsController::class)->middleware('admin');
Route::get('/admin/educations/checkSlug', [AdminEducationsController::class, 'checkSlug'])->middleware('admin');

//Route Admin Competencies
Route::resource('/admin/competencies', AdminCompetenciesController::class)->middleware('admin');
Route::get('/admin/competencies/checkSlug', [AdminCompetenciesController::class, 'checkSlug'])->middleware('admin');
