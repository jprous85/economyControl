<?php

use Src\Role\Infrastructure\Controllers\RoleDeleteController;
use Src\Role\Infrastructure\Controllers\RoleGetController;
use Src\Role\Infrastructure\Controllers\RolePostController;
use Src\Role\Infrastructure\Controllers\RolePutController;

Route::get('/read', [RoleGetController::class, 'read']);
Route::get('/{id}/show', [RoleGetController::class, 'show']);
Route::post('/create', [RolePostController::class, 'create']);
Route::put('/{id}/update', [RolePutController::class, 'update']);
Route::delete('/{id}/delete', [RoleDeleteController::class, 'delete']);
