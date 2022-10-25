<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EstimaraController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\TeacherController;
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
    
    // admin
    Route::prefix('/admin')->middleware('auth')->group(function() {
        Route::get('/', [AdminController::class, 'dashboard'])->name('admin');
        Route::get('/estimara', [AdminController::class, 'estimara'])->name('admin.estimara');
       
        Route::prefix('atelier')->group(function() {
            Route::get('/', [AdminController::class, 'atelier'])->name('admin.atelier');
            Route::post('/add', [AdminController::class, 'atelierAdd'])->name('admin.atelier.add');
        });

    });
    // teachers
    Route::prefix('/teachers')->middleware('auth')->group(function() {
        Route::get('/', [TeacherController::class, 'dashboard'])->name('teachers');
    });

    // students
    Route::prefix('/students')->middleware('auth')->group(function() {
        Route::get('/', [StudentsController::class, 'dashboard'])->name('students');
    });
   

    Route::prefix('/')->middleware('guest')->group(function() {
    //estimara
        Route::prefix('estimara')->group(function() {
            Route::get('/', [EstimaraController::class, 'step1'])->name('estimara');
        });
    });


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
