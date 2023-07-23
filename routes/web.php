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

Route::get('/', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'Authlogin']);
Route::get('/logout', [AuthController::class, 'logout']);


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('admin/dashboard', function () {
    return view('admin.dashboard');
});

Route::get('admin/admin', function () {
    return view('admin.admin.list');
});


Route::group(['middleware' => 'admin'], function () {
    Route::get('admin/dashboard', function () {
        return view('admin.dashboard');
    });
    
});

Route::group(['middleware' => 'lecturer'], function () {
    Route::get('lecturer/dashboard', function () {
        return view('admin.dashboard');
    });
    
});

Route::group(['middleware' => 'student'], function () {
    Route::get('student/dashboard', function () {
        return view('admin.dashboard');
    });
    
});

Route::group(['middleware' => 'parent'], function () {
    Route::get('parent/dashboard', function () {
        return view('admin.dashboard');
    });
    
});

Route::group(['middleware' => 'staff'], function () {
    Route::get('staff/dashboard', function () {
        return view('admin.dashboard');
    });
    
});