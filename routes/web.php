<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfesorController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\ModuloController;

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

Route::group(['prefix' => 'api', ], function (){
    include('api.php');
});


Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/listamodulos', [ModuloController::class, 'showModulos'])->name('modulo.showModulos');
    Route::get('/mismodulos', [ModuloController::class, 'misModulos'])->name('modulo.misModulos');

    Route::middleware(['redirectBasedOnRole:1'])->group(function () {
        // Route::get('/dashboard/profesor', [ProfesorController::class, 'index'])->name('dashboard.profesor');
        // Route::get('/dashboard/profesor/addmodulo', [ModuloController::class, 'addModulo'])->name('modulo.addModulo');
        Route::get('/addmodulo', [ModuloController::class, 'viewAddmodulo'])->name('modulo.viewAddModulo');
        Route::post('/addmodulo', [ModuloController::class, 'addModulo'])->name('modulo.addModulo');

        Route::get('/adduf', [ModuloController::class, 'viewAddUf'])->name('modulo.viewAddUf');
        Route::post('/adduf', [ModuloController::class, 'addUf'])->name('modulo.addUf');

        Route::get('/deleteuser', [ModuloController::class, 'viewDeleteUser'])->name('modulo.viewDeleteUser');
        Route::delete('/deleteuser', [ModuloController::class, 'deleteUser'])->name('modulo.deleteUser');

        Route::get('/formulario', [ModuloController::class, 'mostrarFormulario'])->name('modulo.mostrarFormulario');
        Route::post('/guardar-relacion', [ModuloController::class, 'guardarRelacion'])->name('modulo.guardarRelacion');

        Route::get('/avaluacion', [ModuloController::class, 'viewAvaluacion'])->name('modulo.viewAvaluacion');
        Route::post('/avaluacion', [ModuloController::class, 'avaluacion'])->name('modulo.avaluacion');

    });

    Route::middleware(['redirectBasedOnRole:2'])->group(function () {
        // Route::get('/dashboard/alumno', [AlumnoController::class, 'index'])->name('dashboard.alumno');
    });
});

require __DIR__.'/auth.php';
