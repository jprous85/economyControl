<?php

use Src\Auth\Infrastructure\Controllers\AuthPostController;


Route::post('/login', [AuthPostController::class, 'login']);
Route::post('/register', [AuthPostController::class, 'register']);
