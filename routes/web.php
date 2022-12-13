<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InquiryController;
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
//    ->middleware(['auth'])
    ->group(function(){
        Route::get('/', [InquiryController::class, 'index'])->name('index');

        Route::post('/', [InquiryController::class, 'store'])->name('store');

        Route::get('/complete', [InquiryController::class, 'complete'])->name('complete');
    });


Route::get('/', function () {
    return view('welcome');
});

//Route::get('/inquiries', [InquiryController::class, 'index']);
//
//Route::post('/inquiries', [InquiryController::class, 'store']);
//
//Route::get('/inquiries/complete', [InquiryController::class, 'complete']);

