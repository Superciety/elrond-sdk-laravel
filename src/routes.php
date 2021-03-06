<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'web'], function () {
    Route::post('prepare-tx/{name}', \Superciety\ElrondSdk\Http\Controllers\PreparedTxController::class);
    Route::post('vm-query/{name}', \Superciety\ElrondSdk\Http\Controllers\VmQueryController::class);
});
