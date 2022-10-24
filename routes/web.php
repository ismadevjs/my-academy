<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentsController;
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

Route::prefix('/')->group(function() {

    Route::prefix('admin')->group(function() {
        Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    });

    // teacher
    Route::prefix('teachers')->group(function() {
        Route::get('/', [TeacherController::class, 'dashboard'])->name('teacher.dashboard');
    });
    
    //students
    Route::prefix('students')->group(function() {
        Route::get('/', [StudentsController::class, 'dashboard'])->name('students.dashboard');
    });
});
