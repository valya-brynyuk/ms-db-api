<?php

use App\Http\Controllers\Api\BrokerController;
use App\Http\Controllers\Api\MatterController;
use App\Http\Controllers\Api\TransactionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::name('v1.')->prefix('v1')->group(function () {
    Route::name('broker.')->prefix('broker')->group(function () {
        Route::get('/', [BrokerController::class, 'index'])->name('index');
        Route::post('/check-user', [BrokerController::class, 'checkUser'])->name('checkUser');
    });

    Route::name('matter.')->prefix('matter')->group(function () {
        Route::get('/{matterId}', [MatterController::class, 'matterDetails'])->name('details');
        Route::get('/{matterId}/single', [MatterController::class, 'singleDetails'])->name('singleDetails');
        Route::get('/{matterId}/history', [MatterController::class, 'matterHistory'])->name('history');
        Route::get('/{matterId}/milestone-dates', [MatterController::class, 'milestoneDates'])->name('milestoneDates');
    });

    Route::name('transaction.')->prefix('transaction')->group(function () {
        Route::get('/details', [TransactionController::class, 'clientTransactionDetails'])->name('details');
    });
});
