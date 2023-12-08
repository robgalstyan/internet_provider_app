<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceCompatibilityController;
use App\Http\Controllers\ApplicationController;

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



Route::get('/', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/new', [ServiceController::class, 'create'])->name('services.create');
Route::post('/services/create', [ServiceController::class, 'store'])->name('services.store');
Route::get('/services/{id}/edit', [ServiceController::class, 'edit'])->name('services.edit');
Route::put('/services/{id}/update', [ServiceController::class, 'update'])->name('services.update');
Route::delete('/services/{id}', [ServiceController::class, 'destroy'])->name('services.delete');

Route::get('/service-compatibilities', [ServiceCompatibilityController::class, 'index'])->name('service-compatibilities.index');
Route::get('/service-compatibilities/sync', [ServiceCompatibilityController::class, 'show'])->name('service-compatibilities.show');
Route::post('/service-compatibilities/sync', [ServiceCompatibilityController::class, 'sync'])->name('service-compatibilities.sync');

Route::post('/application/check', [ApplicationController::class, 'check'])->name('application.check');
Route::post('/application/uncheck', [ApplicationController::class, 'uncheck'])->name('application.uncheck');
