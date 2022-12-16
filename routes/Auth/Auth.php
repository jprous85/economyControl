<?php

use Src\Auth\Infrastructure\Controllers\AuthPostController;


Route::post('/login', [AuthPostController::class, 'login']);
Route::post('/logout', [AuthPostController::class, 'logout']);
Route::post('/register', [AuthPostController::class, 'register']);
