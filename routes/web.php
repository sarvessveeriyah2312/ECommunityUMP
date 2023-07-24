<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\StudentController;

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

Route::get('/', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'Authlogin']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/forgot-password', [AuthController::class, 'forgotpassword']);
Route::post('/forgot-password', [AuthController::class, 'PostForgotPassword']);
Route::get('/reset/{token}', [AuthController::class, 'resetpassword']);
Route::post('/reset/{token}', [AuthController::class, 'PostResetPassword']);




// Route::get('/', function () {
//     return view('welcome');
// });




Route::group(['middleware' => 'admin'], function () {
    Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);
    // Administrator Management
    Route::get('admin/admin', [AdminController::class, 'list']);
    Route::get('admin/admin/add', [AdminController::class, 'add']);
    Route::post('admin/admin/add', [AdminController::class, 'insert']);
    Route::get('/edit-user/{id}', [AdminController::class, 'edit']);
    Route::post('/edit-user/{id}', [AdminController::class, 'update'])->name('updateUser');
    Route::delete('/delete-user/{id}', [AdminController::class, 'destroy'])->name('deleteUser');

    Route::get('admin/lecturer', [LecturerController::class, 'list']);
    Route::get('admin/lecturer/add', [LecturerController::class, 'add']);
    Route::post('admin/lecturer/add', [LecturerController::class, 'insert']);
    Route::get('/edit-lecturer/{id}', [LecturerController::class, 'edit']);
    Route::post('/edit-lecturer/{id}', [LecturerController::class, 'update'])->name('updateLecturer');
    Route::delete('/delete-lecturer/{id}', [LecturerController::class, 'destroy'])->name('deleteLecturer');

    Route::get('admin/student', [StudentController::class, 'list']);
    Route::get('admin/student/add', [StudentController::class, 'add']);
    Route::post('admin/student/add', [StudentController::class, 'insert']);
    Route::get('/edit-student/{id}', [StudentController::class, 'edit']);
    Route::post('/edit-student/{id}', [StudentController::class, 'update'])->name('updateStudent');
    Route::delete('/delete-student/{id}', [StudentController::class, 'destroy'])->name('deleteStudent');


    Route::get('admin/parents', [ParentController::class, 'list']);
    Route::get('admin/parents/add', [ParentController::class, 'add']);
    Route::post('admin/parents/add', [ParentController::class, 'insert']);
    Route::get('/edit-parent/{id}', [ParentController::class, 'edit']);
    Route::post('/edit-parent/{id}', [ParentController::class, 'update'])->name('updateParent');
    Route::delete('/delete-parent/{id}', [ParentController::class, 'destroy'])->name('deleteParent');

    
    Route::get('admin/staff', [StaffController::class, 'list']);
    Route::get('admin/staff/add', [StaffController::class, 'add']);
    Route::post('admin/staff/add', [StaffController::class, 'insert']);
    Route::get('/edit-staff/{id}', [StaffController::class, 'edit']);
    Route::post('/edit-staff/{id}', [StaffController::class, 'update'])->name('updateStaff');
    Route::delete('/delete-staff/{id}', [StaffController::class, 'destroy'])->name('deleteStaff');
    







    
});

Route::group(['middleware' => 'lecturer'], function () {
    Route::get('lecturer/dashboard', [DashboardController::class, 'dashboard']);
    
});

Route::group(['middleware' => 'student'], function () {
    Route::get('student/dashboard', [DashboardController::class, 'dashboard']);
    
});

Route::group(['middleware' => 'parent'], function () {
    Route::get('parent/dashboard', [DashboardController::class, 'dashboard']);
    
});

Route::group(['middleware' => 'staff'], function () {
    Route::get('staff/dashboard', [DashboardController::class, 'dashboard']);
});