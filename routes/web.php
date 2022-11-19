<?php

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

Route::get('/', [App\Http\Controllers\DocController::class, 'index'])->name('index'); //home page
Route::get('/show', [App\Http\Controllers\DocController::class, 'show'])->name('show'); //page with table of data from DB
Route::get('/create', [App\Http\Controllers\DocController::class, 'create'])->name('create'); //page for building API query
Route::post('/create', [App\Http\Controllers\DocController::class, 'store'])->name('create'); //handling post query
Route::delete('/', [App\Http\Controllers\DocController::class, 'destroy'])->name('destroy'); //handling delete query

