<?php

use Illuminate\Support\Facades\Route;

//Models
use App\Models\User;

//Admin
use App\Http\Controllers\AdminDashboardController;

use App\Http\Controllers\AdminCategoriesController;
use App\Http\Controllers\AdminCompetenciesController;
use App\Http\Controllers\AdminEducationsController;
use App\Http\Controllers\AdminEmployeesController;
use App\Http\Controllers\AdminClientsController;
use App\Http\Controllers\AdminNotifiesController;
use App\Http\Controllers\AdminRegionController;
use App\Http\Controllers\AdminSubregionController;

use App\Http\Controllers\AdminCheckController;
use App\Http\Controllers\AdminAcceptedTaskController;
use App\Http\Controllers\AdminEmployeeAcceptedController;
use App\Http\Controllers\AdminEmployeeRejectedController;
use App\Http\Controllers\AdminPaymentController;
use App\Http\Controllers\AdminProfileController;

use App\Http\Controllers\EmployeePaymentsController;

use App\Http\Controllers\ClientEmployeeController;
use App\Http\Controllers\ClientsPaymentController;
use App\Http\Controllers\ClientTaskDoneController;

use App\Http\Controllers\AdminEmployeeDoneController;
use App\Http\Controllers\AdminTasksController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RegisterClientsController;

use App\Http\Controllers\DashboardProfileController;
use App\Http\Controllers\DashboardPaymentsController;
use App\Http\Controllers\DashboardPekerjaController;
use App\Http\Controllers\DashboardRekeningController;
use App\Http\Controllers\EmployeeNotifiesController;
use App\Http\Controllers\DashboardTaskController;


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

Route::get('/', [HomeController::class, 'index'])->name('/')->middleware('guest');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
//Route Register
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::get('/register-penyedia', [RegisterClientsController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);
Route::post('/register-penyedia', [RegisterClientsController::class, 'store']);

//Route Login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);

//Route Logout
Route::post('/logout', [LoginController::class, 'logout']);


Route::get('/admin', [AdminDashboardController::class, 'index'])->middleware('admin', 'penyedia');

//Route login dashboard
// Route::get('/admin', function(){
//     return view('admin.index');
// })->middleware('admin','penyedia');



//Route Admin Category
Route::resource('/admin/categories', AdminCategoriesController::class)->middleware('admin');

//Route admin region
Route::resource('/admin/data-region', AdminRegionController::class)->middleware('admin');

//Route admin sub-region
Route::resource('/admin/data-sub-region', AdminSubregionController::class)->middleware('admin');

//edit profile admin dan penyedia
Route::resource('/admin/profile', AdminProfileController::class)->middleware('admin', 'penyedia');

//Admin accepted task data
Route::resource('/admin/accepted-task', AdminAcceptedTaskController::class)->middleware('admin');

//Checkbox All
Route::resource('/admin/checkall',  AdminCheckController::class)->middleware('admin');

//Admin payment
Route::resource('/admin/admin-payments', AdminPaymentController::class)->middleware('admin');

//Admin make payment
Route::resource('/admin/data-pembayaran', EmployeePaymentsController::class)->middleware('admin');

//Penyedia make payment 
Route::resource('/admin/clients-payment', ClientsPaymentController::class)->middleware('penyedia');

Route::resource('/admin/done-task', AdminEmployeeDoneController::class)->middleware('admin');

//accepted Employee list admin
Route::resource('/admin/accepted-employee', AdminEmployeeAcceptedController::class)->middleware('admin');

//rejected employee list admin
Route::resource('/admin/employee-rejected', AdminEmployeeRejectedController::class)->middleware('admin');

//Route User
Route::resource('/admin/pekerja', AdminEmployeesController::class)->middleware('admin');

//Route Penyedia
Route::resource('/admin/clients', AdminClientsController::class)->middleware('admin');

//Route Notifikasi
Route::resource('/admin/admin-notifies', AdminNotifiesController::class)->middleware('admin','penyedia');

//Client Employee
Route::resource('/admin/clients-employee', ClientEmployeeController::class)->middleware('penyedia');

//Client Task Done
Route::get('/admin/clients-task-done', [ClientTaskDoneController::class, 'index'])->middleware('penyedia');

//Task
Route::resource('/admin/tasks', AdminTasksController::class)->middleware('admin','penyedia');

//Route Admin Competency
Route::resource('/admin/competencies', AdminCompetenciesController::class)->middleware('admin');
Route::get('/admin/competencies/checkSlug', [AdminCompetenciesController::class, 'checkSlug'])->middleware('admin');

//Route Admin Educations
Route::resource('/admin/educations', AdminEducationsController::class)->middleware('admin');
Route::get('/admin/educations/checkSlug', [AdminEducationsController::class, 'checkSlug'])->middleware('admin');

//Route Admin Competencies
Route::resource('/admin/competencies', AdminCompetenciesController::class)->middleware('admin');
Route::get('/admin/competencies/checkSlug', [AdminCompetenciesController::class, 'checkSlug'])->middleware('admin');

//Route Pekerja
Route::resource('/dashboard', DashboardPekerjaController::class)->middleware('pekerja');

//Route Pekerja Task
Route::resource('/tasks', DashboardTaskController::class)->middleware('pekerja');

//Notify
Route::resource('/pekerja/notify', EmployeeNotifiesController::class)->middleware('pekerja');

//Rekening
Route::resource('/pekerja/rekening', DashboardRekeningController::class)->middleware('pekerja');

//Payment Pegawai
Route::resource('/pekerja/payments', DashboardPaymentsController::class)->middleware('pekerja');

//Profile Pegawai
Route::resource('/pekerja/profile', DashboardProfileController::class)->middleware('pekerja');


