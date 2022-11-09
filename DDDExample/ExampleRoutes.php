<?php

use __BasePath__\__ModuleName__\Infrastructure\Controllers\__ModuleName__DeleteController;
use __BasePath__\__ModuleName__\Infrastructure\Controllers\__ModuleName__GetController;
use __BasePath__\__ModuleName__\Infrastructure\Controllers\__ModuleName__PostController;
use __BasePath__\__ModuleName__\Infrastructure\Controllers\__ModuleName__PutController;

Route::middleware(['scope:'])->get('/read', [__ModuleName__GetController::class, 'read']);
Route::middleware(['scope:'])->get('/{id}/show', [__ModuleName__GetController::class, 'show']);
Route::middleware(['scope:'])->post('/create', [__ModuleName__PostController::class, 'create']);
Route::middleware(['scope:'])->put('/{id}/update', [__ModuleName__PutController::class, 'update']);
Route::middleware(['scope:'])->delete('/{id}/delete', [__ModuleName__DeleteController::class, 'delete']);
