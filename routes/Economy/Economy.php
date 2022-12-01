<?php

use Src\Economy\Infrastructure\Controllers\EconomyDeleteController;
use Src\Economy\Infrastructure\Controllers\EconomyGetController;
use Src\Economy\Infrastructure\Controllers\EconomyPostController;
use Src\Economy\Infrastructure\Controllers\EconomyPutController;

Route::get('/read', [EconomyGetController::class, 'read']);
Route::get('/{id}/show', [EconomyGetController::class, 'show']);
Route::post('/create', [EconomyPostController::class, 'create']);
Route::post('/income/{id}/add', [EconomyPostController::class, 'addIncome']);
Route::put('/{id}/update', [EconomyPutController::class, 'update']);
Route::delete('/{id}/delete', [EconomyDeleteController::class, 'delete']);
