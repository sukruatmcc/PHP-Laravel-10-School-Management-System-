<?php

use App\Http\Controllers\AuthController;
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

Route::get('/', [AuthController::class,'login'])->name('login');
Route::post('/auth/login', [AuthController::class,'auhtLogin'])->name('auth.login');
Route::get('logout',[AuthController::class,'logout']);



Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});


Route::get('/admin/admin/list', function () {
    return view('admin.admin.list');
});

