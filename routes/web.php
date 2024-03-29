<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\ClassSubjectController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
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

    //admin
    Route::get('/list',[AdminController::class,'index'])->name('admin.index');
    Route::get('/add',[AdminController::class,'create'])->name('admin.create');
    Route::post('/add',[AdminController::class,'store'])->name('admin.store');
    Route::get('/edit/{id}',[AdminController::class,'edit'])->name('admin.edit');
    Route::post('/edit/{id}',[AdminController::class,'update'])->name('admin.update');
    Route::get('/delete/{id}',[AdminController::class,'destroy'])->name('admin.destroy');
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');

    //admin
    Route::get('/teacher/list',[TeacherController::class,'index'])->name('admin.teacher.index');
    Route::get('/teacher/add',[TeacherController::class,'create'])->name('admin.teacher.create');
    Route::post('/teacher/add',[TeacherController::class,'store'])->name('admin.teacher.store');
    Route::get('/teacher/edit/{id}',[TeacherController::class,'edit'])->name('admin.teacher.edit');
    Route::post('/teacher/edit/{id}',[TeacherController::class,'update'])->name('admin.teacher.update');
    Route::get('/teacher/delete/{id}',[TeacherController::class,'destroy'])->name('admin.teacher.destroy');

    //student
    Route::get('/student/list',[StudentController::class,'index'])->name('admin.student.index');
    Route::get('/student/add',[StudentController::class,'create'])->name('admin.student.create');
    Route::post('/student/add',[StudentController::class,'store'])->name('admin.student.store');
    Route::get('/student/edit/{id}',[StudentController::class,'edit'])->name('admin.student.edit');
    Route::post('/student/edit/{id}',[StudentController::class,'update'])->name('admin.student.update');
    Route::get('/student/delete/{id}',[StudentController::class,'destroy'])->name('admin.student.destroy');

    //parent
    Route::get('/parent/list',[ParentController::class,'index'])->name('admin.parent.index');
    Route::get('/parent/add',[ParentController::class,'create'])->name('admin.parent.create');
    Route::post('/parent/add',[ParentController::class,'store'])->name('admin.parent.store');
    Route::get('/parent/edit/{id}',[ParentController::class,'edit'])->name('admin.parent.edit');
    Route::post('/parent/edit/{id}',[ParentController::class,'update'])->name('admin.parent.update');
    Route::get('/parent/delete/{id}',[ParentController::class,'destroy'])->name('admin.parent.destroy');
    Route::get('/parent/my-student/{id}',[ParentController::class,'myStudent'])->name('admin.parent.my_student');
    Route::get('/parent/assign_student_parent/{student_id}/{parentID}',[ParentController::class,'assignStudentParent'])->name('admin.parent.assign_student_parent');
    Route::get('/parent/assign_student_parent_delete/{student_id}',[ParentController::class,'studentParentDestroy'])->name('admin.parent.assign_student_parent.destroy');

    //class
    Route::get('/class/list',[ClassController::class,'index'])->name('admin.class.index');
    Route::get('/class/add',[ClassController::class,'create'])->name('admin.class.create');
    Route::post('/class/add',[ClassController::class,'store'])->name('admin.class.store');
    Route::get('/class/edit/{id}',[ClassController::class,'edit'])->name('admin.class.edit');
    Route::post('/class/edit/{id}',[ClassController::class,'update'])->name('admin.class.update');
    Route::get('/class/delete/{id}',[ClassController::class,'destroy'])->name('admin.class.destroy');

    //subject
    Route::get('/subject/list',[SubjectController::class,'index'])->name('admin.subject.index');
    Route::get('/subject/add',[SubjectController::class,'create'])->name('admin.subject.create');
    Route::post('/subject/add',[SubjectController::class,'store'])->name('admin.subject.store');
    Route::get('/subject/edit/{id}',[SubjectController::class,'edit'])->name('admin.subject.edit');
    Route::post('/subject/edit/{id}',[SubjectController::class,'update'])->name('admin.subject.update');
    Route::get('/subject/delete/{id}',[SubjectController::class,'destroy'])->name('admin.subject.destroy');

    //assign_subject
    Route::get('/assign-subject/list',[ClassSubjectController::class,'index'])->name('admin.assign_subject.index');
    Route::get('/assign-subject/add',[ClassSubjectController::class,'create'])->name('admin.assign_subject.create');
    Route::post('/assign-subject/add',[ClassSubjectController::class,'store'])->name('admin.assign_subject.store');
    Route::get('/assign-subject/edit/{id}',[ClassSubjectController::class,'edit'])->name('admin.assign_subject.edit');
    Route::post('/assign-subject/edit/{id}',[ClassSubjectController::class,'update'])->name('admin.assign_subject.update');
    Route::get('/assign-subject/delete/{id}',[ClassSubjectController::class,'destroy'])->name('admin.assign_subject.destroy');
    Route::get('/assign-subject/edit_single/{id}',[ClassSubjectController::class,'edit_single'])->name('admin.assign_subject.edit_single');
    Route::post('/assign-subject/edit_single/{id}',[ClassSubjectController::class,'update_single'])->name('admin.assign_subject.update_single');

    //myaccount
    Route::get('/my-account', [UserController::class, 'myAccount'])->name('admin.my_account');
    Route::post('/my-account/update', [UserController::class, 'adminUpdateAccountMy'])->name('admin.my_account.update');

    //change_password
    Route::get('/change-password',[UserController::class,'changePassword'])->name('change_password');
    Route::post('/change-password',[UserController::class,'changePasswordUpdate'])->name('change_password.update');

});

Route::group(['prefix' => 'teacher', 'middleware' => 'teacher'], function () {

    Route::get('/dashboard', [DashboardController::class, 'dashboard']);
    Route::get('/my-account', [UserController::class, 'myAccount'])->name('teacher.my_account');
    Route::post('/my-account', [UserController::class, 'updateAccountMy'])->name('teacher.my_account.update');

    //change_password
    Route::get('/change-password',[UserController::class,'changePassword'])->name('teacher.change_password');
    Route::post('/change-password',[UserController::class,'changePasswordUpdate'])->name('teacher.change_password.update');
});

Route::group(['prefix' => 'student', 'middleware' => 'student'], function () {

    Route::get('/dashboard', [DashboardController::class, 'dashboard']);
    Route::get('/my-account', [UserController::class, 'myAccount'])->name('student.my_account');
    Route::post('/my-account/update', [UserController::class, 'studentUpdateMyAccount'])->name('student.my_account.update');
    Route::get('/my-subject', [SubjectController::class, 'subjectMy'])->name('student.my_subject');

    //change_password
    Route::get('/change-password',[UserController::class,'changePassword'])->name('student.change_password');
    Route::post('/change-password',[UserController::class,'changePasswordUpdate'])->name('student.change_password.update');
});

Route::group(['prefix' => 'parent', 'middleware' => 'parent'], function () {

    Route::get('/dashboard', [DashboardController::class, 'dashboard']);
    Route::get('/my-account', [UserController::class, 'myAccount'])->name('parent.my_account');
    Route::post('/my-account/update', [UserController::class, 'parentMyAccountUpdate'])->name('parent.my_account.update');

    //change_password
    Route::get('/change-password',[UserController::class,'changePassword'])->name('parent.change_password');
    Route::post('/change-password',[UserController::class,'changePasswordUpdate'])->name('parent.change_password.update');
    Route::get('/my-student',[ParentController::class,'parentMyStudent'])->name('parent.my_student');

});
