<?php

use App\Http\Controllers\ExcelController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return to_route('excel.import');
});

Route::prefix('import')->name('excel.import.')->group(function () {
    Route::get('/', [ExcelController::class, 'showImportForm'])->name('form');
    Route::post('/', [ExcelController::class, 'import'])->name('process');
});

Route::prefix('encrypt')->name('excel.encrypt.')->group(function () {
    Route::post('/download', [ExcelController::class, 'downloadEncrypted'])->name('download');
});

Route::prefix('decrypt')->name('excel.decrypt.')->group(function () {
    Route::get('/', [ExcelController::class, 'showDecryptForm'])->name('form');
    Route::post('/', [ExcelController::class, 'decrypt'])->name('process');
    Route::post('/download', [ExcelController::class, 'downloadDecrypted'])->name('download');
});
