<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuratController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('surats',SuratController::class);
Route::get('surats/{surat}/pdf',[SuratController::class,'exportPdf'])->name('surats.pdf');
   

// Route::middleware(['auth'])->group(function(){
//     Route::resource('surats',SuratController::class);
//     Route::get('surats/{surat}/pdf',[SuratController::class,'exportPdf'])->name('surats.pdf');
//     Route::resource('items',ItemController::class);
//     Route::resource('transactions',TransactionController::class);
// });
