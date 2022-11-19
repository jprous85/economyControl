<?php

use Src\User\Infrastructure\Controllers\UserDeleteController;
use Src\User\Infrastructure\Controllers\UserGetController;
use Src\User\Infrastructure\Controllers\UserPostController;
use Src\User\Infrastructure\Controllers\UserPutController;

Route::get('/read', [UserGetController::class, 'read']);
Route::get('/{id}/show', [UserGetController::class, 'show']);
Route::post('/create', [UserPostController::class, 'create']);
Route::put('/{id}/update', [UserPutController::class, 'update']);
Route::delete('/{id}/delete', [UserDeleteController::class, 'delete']);
