<?php

use Src\Account\Infrastructure\Controllers\AccountDeleteController;
use Src\Account\Infrastructure\Controllers\AccountGetController;
use Src\Account\Infrastructure\Controllers\AccountPostController;
use Src\Account\Infrastructure\Controllers\AccountPutController;

Route::get('/read', [AccountGetController::class, 'read']);
Route::get('/{uuid}/show', [AccountGetController::class, 'show']);
Route::get('/{uuid}/duplicate', [AccountGetController::class, 'duplicate']);
Route::get('/by-user/{id}/show', [AccountGetController::class, 'getAccountByUser']);
Route::post('/create', [AccountPostController::class, 'create']);
Route::put('/{uuid}/update', [AccountPutController::class, 'update']);
Route::put('/{uuid}/includeUser/{userId}', [AccountPutController::class, 'insertUserAccount']);
Route::put('/{uuid}/deleteUser/{userId}', [AccountPutController::class, 'deleteUserAccount']);
Route::put('/{uuid}/includeOwner/{userId}', [AccountPutController::class, 'insertOwnerAccount']);
Route::put('/{uuid}/deleteOwner/{userId}', [AccountPutController::class, 'deleteOwnerAccount']);
Route::delete('/{uuid}/delete', [AccountDeleteController::class, 'delete']);
