<?php

declare(strict_types = 1);

namespace __BasePath__\__ModuleName__\Infrastructure\Controllers;

use __BasePath__\__ModuleName__\Application\Request\Create__ModuleName__Request;
use __BasePath__\__ModuleName__\Application\UseCases\Create__ModuleName__;
use Src\Shared\Infrastructure\Controllers\ReturnsMiddleware;
use Symfony\Component\HttpFoundation\JsonResponse;

final class __ModuleName__PostController extends ReturnsMiddleware
{
    public function __construct(private Create__ModuleName__ $create)
    {}

    //TODO:: get laravel request
    public function create(__ModuleName__Request $request): JsonResponse
    {
        $request = $this->mapper($request);
        $__ModuleMinUnderscoreName___id = ($this->create)($request);
        return $this->successResponse('', $__ModuleMinUnderscoreName___id);
    }

    private function mapper(__ModuleName__Request $request): Create__ModuleName__Request
    {
        return new Create__ModuleName__Request(
// -- get value from request in controllers -- //
        );
    }
}
