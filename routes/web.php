<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LotController;
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

Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/lots/{lot}', [IndexController::class, 'show'])->name('lot.show');
Route::prefix('crud')->name('crud.')->group(function () {
    Route::resource('category', CategoryController::class)->except('show');
    Route::resource('lot', LotController::class)->except('show');
});

