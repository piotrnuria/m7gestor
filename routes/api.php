<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ModuloController;
use App\Http\Controllers\api\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::apiResource('users', UserController::class);
// Route::apiResource('modulos', ModuloController::class);

Route::get('/showmodulo', [ModuloController::class, 'index'])->name('index.modulo');
Route::post('/storemodulo', [ModuloController::class, 'store'])->name('store.modulo');
Route::get('/showmoduloid/{id}', [ModuloController::class, 'show'])->name('show.modulo');
Route::put('/updatemodulo/{id}', [ModuloController::class, 'update'])->name('update.modulo');
Route::delete('/destroymodulo/{id}', [ModuloController::class, 'destroy'])->name('destroy.modulo');

Route::get('/showuser', [UserController::class, 'index'])->name('index.user');
Route::post('/storeuser', [UserController::class, 'store'])->name('store.user');
Route::get('/showuserid/{id}', [UserController::class, 'show'])->name('show.user');
Route::put('/updateuser/{id}', [UserController::class, 'update'])->name('update.user');
Route::delete('/destroyuser/{id}', [UserController::class, 'destroy'])->name('destroy.user');


