<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::name('v1.')->prefix('v1')->group(function () {
    Route::name('broker.')->prefix('broker')->group(function () {
        Route::get('/', [\App\Http\Controllers\Api\BrokerController::class, 'index'])->name('index');
    });

    Route::name('matter.')->prefix('matter')->group(function () {
        Route::get('/{matterId}', [\App\Http\Controllers\Api\MatterController::class, 'matterDetails'])->name('details');
        Route::get('/{matterId}/history', [\App\Http\Controllers\Api\MatterController::class, 'matterHistory'])->name('history');
    });

    Route::name('transaction.')->prefix('transaction')->group(function () {
        Route::get('/details', [\App\Http\Controllers\Api\TransactionController::class, 'clientTransactionDetails'])->name('details');
    });
});
