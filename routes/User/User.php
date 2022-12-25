<?php

use Src\User\Infrastructure\Controllers\UserDeleteController;
use Src\User\Infrastructure\Controllers\UserGetController;
use Src\User\Infrastructure\Controllers\UserPostController;
use Src\User\Infrastructure\Controllers\UserPutController;

Route::middleware('scope:admin')->get('/read', [UserGetController::class, 'read']);
Route::middleware('scope:admin')->post('/accountUsers', [UserGetController::class, 'accountUsers']);
Route::middleware('scope:admin,guest')->get('/{id}/show', [UserGetController::class, 'show']);
Route::middleware('scope:admin')->post('/create', [UserPostController::class, 'create']);
Route::middleware('scope:admin')->put('/{id}/update', [UserPutController::class, 'update']);
Route::middleware('scope:admin')->delete('/{id}/delete', [UserDeleteController::class, 'delete']);
