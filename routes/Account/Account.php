<?php

use Src\Account\Infrastructure\Controllers\AccountDeleteController;
use Src\Account\Infrastructure\Controllers\AccountGetController;
use Src\Account\Infrastructure\Controllers\AccountPostController;
use Src\Account\Infrastructure\Controllers\AccountPutController;

Route::get('/read', [AccountGetController::class, 'read']);
Route::get('/{id}/show', [AccountGetController::class, 'show']);
Route::post('/create', [AccountPostController::class, 'create']);
Route::put('/{id}/update', [AccountPutController::class, 'update']);
Route::put('/{id}/includeUser/{userId}', [AccountPutController::class, 'insertUserAccount']);
Route::put('/{id}/deleteUser/{userId}', [AccountPutController::class, 'deleteUserAccount']);
Route::put('/{id}/includeOwner/{userId}', [AccountPutController::class, 'insertOwnerAccount']);
Route::put('/{id}/deleteOwner/{userId}', [AccountPutController::class, 'deleteOwnerAccount']);
Route::delete('/{id}/delete', [AccountDeleteController::class, 'delete']);
