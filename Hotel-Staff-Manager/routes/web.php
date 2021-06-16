<?php

use App\Http\Controllers\StaffController;
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

Route::get('/', [StaffController::class, 'index'])->name('home');
Route::prefix('/')->group(function () {

    Route::get('/create', [StaffController::class, 'createForm'])->name('staff.createForm');
    Route::post('/create', [StaffController::class, 'create'])->name('staff.create');
    Route::get('/update/{id}', [StaffController::class, 'updateForm'])->name('staff.updateForm');
    Route::put('/update/{id}', [StaffController::class, 'update'])->name('staff.update');
    Route::get('/delete/{id}', [StaffController::class, 'delete'])->name('staff.delete');
});
