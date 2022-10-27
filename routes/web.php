<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EstimaraController;
use App\Http\Controllers\mawadController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\TaalimController;
use App\Http\Controllers\SanawatsController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\ApiController;
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
    

    Route::prefix('api/v2')->group(function() {
        Route::get('taalim', [ApiController::class, 'taalim'])->name('api.taalim');
        Route::get('sanawat/{id}', [ApiController::class, 'sanawat'])->name('api.sanawat');
        Route::get('mawad/{id}', [ApiController::class, 'mawad'])->name('api.mawad');
        Route::get('type/{id}', [ApiController::class, 'type'])->name('api.type');
        Route::get('subject/{id}/type/{type}', [ApiController::class, 'subject'])->name('api.subject');
    });

    // admin
    Route::prefix('admin')->middleware('auth')->group(function() {
        Route::get('/', [AdminController::class, 'dashboard'])->name('admin');
        Route::get('/estimara', [AdminController::class, 'estimara'])->name('admin.estimara');
        Route::post('goback', [AdminController::class, 'goback'])->name('goback');
        
        // taalim
        Route::prefix('taalim')->group(function() {
            Route::get('/', [TaalimController::class, 'taalim'])->name('admin.taalim');
            Route::post('/taalim-add', [TaalimController::class, 'taalimPost'])->name('admin.taalim.add');
            Route::post('/taalim-edit', [TaalimController::class, 'taalimEdit'])->name('admin.taalim.update');
            Route::post('/taalim-delete', [TaalimController::class, 'taalimDelete'])->name('admin.taalim.delete');
            Route::post('/taalim-delete-all', [TaalimController::class, 'taalimDeleteAll'])->name('admin.taalim.delete.all');
        });

         // sanawats
         Route::prefix('sanawats')->group(function() {
            Route::get('/', [SanawatsController::class, 'sanawats'])->name('admin.sanawats');
            Route::post('/sanawats-add', [SanawatsController::class, 'sanawatsPost'])->name('admin.sanawats.add');
            Route::post('/sanawats-edit', [SanawatsController::class, 'sanawatsEdit'])->name('admin.sanawats.update');
            Route::post('/sanawats-delete', [SanawatsController::class, 'sanawatsDelete'])->name('admin.sanawats.delete');
            Route::post('/sanawats-delete-all', [SanawatsController::class, 'sanawatsDeleteAll'])->name('admin.sanawats.delete.all');
        });

         // mawads
         Route::prefix('mawads')->group(function() {
            Route::get('/', [mawadController::class, 'mawads'])->name('admin.mawads');
            Route::post('/mawads-add', [mawadController::class, 'mawadsPost'])->name('admin.mawads.add');
            Route::post('/mawads-edit', [mawadController::class, 'mawadsEdit'])->name('admin.mawads.update');
            Route::post('/mawads-delete', [mawadController::class, 'mawadsDelete'])->name('admin.mawads.delete');
            Route::post('/mawads-delete-all', [mawadController::class, 'mawadsDeleteAll'])->name('admin.mawads.delete.all');
        });


        // types
        Route::prefix('types')->group(function() {
            Route::get('/', [TypeController::class, 'types'])->name('admin.types');
            Route::post('/types-add', [TypeController::class, 'typesPost'])->name('admin.types.add');
            Route::post('/types-edit', [TypeController::class, 'typesEdit'])->name('admin.types.update');
            Route::post('/types-delete', [TypeController::class, 'typesDelete'])->name('admin.types.delete');
            Route::post('/types-delete-all', [TypeController::class, 'typesDeleteAll'])->name('admin.types.delete.all');
        });

        // subjects
        Route::prefix('subjects')->group(function() {
            Route::get('/', [SubjectController::class, 'subjects'])->name('admin.subjects');
            Route::post('/subjects-add', [SubjectController::class, 'subjectsPost'])->name('admin.subjects.add');
            Route::post('/subjects-edit', [SubjectController::class, 'subjectsEdit'])->name('admin.subjects.update');
            Route::post('/subjects-delete', [SubjectController::class, 'subjectsDelete'])->name('admin.subjects.delete');
            Route::post('/subjects-delete-all', [SubjectController::class, 'subjectsDeleteAll'])->name('admin.subjects.delete.all');
        });
        


        Route::prefix('atelier')->group(function() {
            Route::get('/', [AdminController::class, 'atelier'])->name('admin.atelier');
            Route::post('/add', [AdminController::class, 'atelierAdd'])->name('admin.atelier.add');
            Route::post('/update', [AdminController::class, 'atelierUpdate'])->name('admin.atelier.update');
            Route::post('/delete', [AdminController::class, 'atelierDelete'])->name('admin.atelier.delete');
            Route::post('/delete-all', [AdminController::class, 'atelierDeleteAll'])->name('admin.atelier.delete.all');
            Route::post('/atelier-type-add', [AdminController::class, 'atelierTypeAdd'])->name('admin.atelier.type.add');
            Route::post('/atelier-doross-add', [AdminController::class, 'atelierDorossAdd'])->name('admin.atelier.doross.add');
            Route::get('/atelier-doross-list', [AdminController::class, 'atelierDorossList'])->name('admin.atelier.doross.list');
            Route::post('/atelier-doross-list-delete', [AdminController::class, 'atelierDorossDelete'])->name('admin.atelier.doross.delete');
            Route::post('/atelier-doross-list-update', [AdminController::class, 'atelierDorossUpdate'])->name('admin.atelier.doross.update');
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
   

 
    //estimara
        Route::prefix('estimara')->group(function() {
            Route::get('/', [EstimaraController::class, 'step1'])->name('estimara');
        });
    


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



require __DIR__.'/auth.php';
