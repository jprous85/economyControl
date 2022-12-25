<?php

use Src\Role\Infrastructure\Controllers\RoleDeleteController;
use Src\Role\Infrastructure\Controllers\RoleGetController;
use Src\Role\Infrastructure\Controllers\RolePostController;
use Src\Role\Infrastructure\Controllers\RolePutController;

Route::middleware(['scope:admin'])->get('/read', [RoleGetController::class, 'read']);
Route::middleware(['scope:admin,guest'])->get('/{id}/show', [RoleGetController::class, 'show']);
Route::middleware(['scope:admin'])->post('/create', [RolePostController::class, 'create']);
Route::middleware(['scope:admin'])->put('/{id}/update', [RolePutController::class, 'update']);
Route::middleware(['scope:admin'])->delete('/{id}/delete', [RoleDeleteController::class, 'delete']);
