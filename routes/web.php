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

Route::get('/{newId}', [App\Http\Controllers\NewsController::class, 'show'])->name('new');
Route::post('news/{newId}/comments', [App\Http\Controllers\NewsCommentsController::class, 'store']);
Route::get('news/{newId}/comments', [App\Http\Controllers\NewsCommentsController::class, 'index']);
