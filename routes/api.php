<?php

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Route;
use Src\Shared\Infrastructure\Controllers\EmailTemplateGetController;
use Symfony\Component\HttpFoundation\Response;

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

Route::get('/health-check', function() {
    return new JsonResponse(['data' => 'OK', 'code' => Response::HTTP_OK]);
});

Route::get('/email/{template}/{uuid}', [EmailTemplateGetController::class, 'showEmailTemplate']);

Route::group([], __DIR__ . '/Auth/Auth.php');


Route::middleware(['auth:api', 'role'])->group(function () {

    Route::middleware(['scope:admin,guest'])->prefix('/users')
        ->group(__DIR__ . '/User/User.php');

    Route::middleware(['scope:admin,guest'])->prefix('/roles')
        ->group(__DIR__ . '/Role/Role.php');

    Route::middleware(['scope:admin,guest'])->prefix('/accounts')
        ->group(__DIR__ . '/Account/Account.php');

    Route::middleware(['scope:admin,guest'])->prefix('/economies')
        ->group(__DIR__ . '/Economy/Economy.php');

    // --insert_new_instance_route

});
