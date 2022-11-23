<?php

use Src\Economy\Infrastructure\Controllers\EconomyDeleteController;
use Src\Economy\Infrastructure\Controllers\EconomyGetController;
use Src\Economy\Infrastructure\Controllers\EconomyPostController;
use Src\Economy\Infrastructure\Controllers\EconomyPutController;

Route::middleware(['scope:'])->get('/read', [EconomyGetController::class, 'read']);
Route::middleware(['scope:'])->get('/{id}/show', [EconomyGetController::class, 'show']);
Route::middleware(['scope:'])->post('/create', [EconomyPostController::class, 'create']);
Route::middleware(['scope:'])->put('/{id}/update', [EconomyPutController::class, 'update']);
Route::middleware(['scope:'])->delete('/{id}/delete', [EconomyDeleteController::class, 'delete']);
