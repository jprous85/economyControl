<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Src\Auth\Infrastructure\Controllers\AuthPostController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([], __DIR__ . '/Auth/Auth.php');


Route::middleware(['auth:api', 'role'])->group(function () {

    Route::middleware(['scope:admin'])->prefix('/users')
        ->group(__DIR__ . '/User/User.php');

    Route::middleware(['scope:admin'])->prefix('/roles')
        ->group(__DIR__ . '/Role/Role.php');

    Route::middleware(['scope:admin'])->prefix('/accounts')
        ->group(__DIR__ . '/Account/Account.php');

    Route::middleware(['scope:admin'])->prefix('/economies')
        ->group(__DIR__ . '/Economy/Economy.php');

    // --insert_new_instance_route

});
