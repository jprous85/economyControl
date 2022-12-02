<?php

use Src\Economy\Infrastructure\Controllers\EconomyDeleteController;
use Src\Economy\Infrastructure\Controllers\EconomyGetController;
use Src\Economy\Infrastructure\Controllers\EconomyPostController;
use Src\Economy\Infrastructure\Controllers\EconomyPutController;

Route::get('/read', [EconomyGetController::class, 'read']);
Route::get('/{id}/show', [EconomyGetController::class, 'show']);
Route::post('/create', [EconomyPostController::class, 'create']);
Route::put('/income/{id}/add', [EconomyPutController::class, 'addIncome']);
Route::put('/spent/{id}/add', [EconomyPutController::class, 'addSpent']);
Route::put('/income/{id}/delete', [EconomyPutController::class, 'deleteIncomeRegisterManagement']);
Route::put('/spent/{id}/delete', [EconomyPutController::class, 'deleteSpentRegisterManagement']);
Route::put('/spent/{id}/paid', [EconomyPutController::class, 'changePaidStatus']);
Route::put('/{id}/update', [EconomyPutController::class, 'update']);
Route::delete('/{id}/delete', [EconomyDeleteController::class, 'delete']);
