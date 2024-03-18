<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/auth/login', [AuthController::class, 'auhtLogin'])->name('auth.login');
Route::get('logout', [AuthController::class, 'logout']);
Route::get('forgot-password',[AuthController::class,'forgotpassword']);
Route::post('forgot-password',[AuthController::class,'forgotPasswordSend']);
Route::get('reset/{token}',[AuthController::class,'reset']);
Route::post('reset/{token}',[AuthController::class,'resetSend']);







// Route::get('/admin/admin/list', function () {
//     return view('admin.admin.list');
// });

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {

    Route::get('/list',[AdminController::class,'index'])->name('admin.index');
    Route::get('/add',[AdminController::class,'create'])->name('admin.create');
    Route::post('/add',[AdminController::class,'store'])->name('admin.store');
    Route::get('/edit/{id}',[AdminController::class,'edit'])->name('admin.edit');
    Route::post('/edit/{id}',[AdminController::class,'update'])->name('admin.update');
    Route::get('/delete/{id}',[AdminController::class,'destroy'])->name('admin.destroy');
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');
});

Route::group(['prefix' => 'teacher', 'middleware' => 'teacher'], function () {

    Route::get('/dashboard', [DashboardController::class, 'dashboard']);
});

Route::group(['prefix' => 'student', 'middleware' => 'student'], function () {

    Route::get('/dashboard', [DashboardController::class, 'dashboard']);
});

Route::group(['prefix' => 'parent', 'middleware' => 'parent'], function () {

    Route::get('/dashboard', [DashboardController::class, 'dashboard']);
});
