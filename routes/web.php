<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\AdminController;
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

Route::prefix('inquiries')
    ->name('inquiries.')
    ->group(function(){
        Route::get('/', [InquiryController::class, 'index'])->name('index');
        Route::post('/', [InquiryController::class, 'store'])->name('store');
        Route::get('/complete', [InquiryController::class, 'complete'])->name('complete');
    });

Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth'])
    ->group(function(){
        Route::get('/inquiries', [AdminController::class, 'index'])->name('index');
        Route::get('/inquiries/{id}', [AdminController::class, 'show'])->name('show');
});

Route::get('/', function () {
    return view('welcome');
});
