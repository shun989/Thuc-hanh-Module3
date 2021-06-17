<?php

use App\Http\Controllers\MemberController;
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
Route::get('/', [MemberController::class,'indexWeb'])->name('home');
Route::get('/create', [MemberController::class,'formCreate'])->name('member.createForm');
Route::post('/create', [MemberController::class,'create'])->name('member.create');
Route::get('/edit/{id}', [MemberController::class,'editForm'])->name('member.updateForm');
Route::put('/update/{id}', [MemberController::class,'updateWeb'])->name('member.update');
Route::get('/destroy/{id}', [MemberController::class,'destroyWeb'])->name('member.delete');

Route::get('/search',[MemberController::class,'getSearch'])->name('member.search');

