<?php

use Src\Account\Infrastructure\Controllers\AccountDeleteController;
use Src\Account\Infrastructure\Controllers\AccountGetController;
use Src\Account\Infrastructure\Controllers\AccountPostController;
use Src\Account\Infrastructure\Controllers\AccountPutController;

Route::middleware(['scope:'])->get('/read', [AccountGetController::class, 'read']);
Route::middleware(['scope:'])->get('/{id}/show', [AccountGetController::class, 'show']);
Route::middleware(['scope:'])->post('/create', [AccountPostController::class, 'create']);
Route::middleware(['scope:'])->put('/{id}/update', [AccountPutController::class, 'update']);
Route::middleware(['scope:'])->delete('/{id}/delete', [AccountDeleteController::class, 'delete']);
