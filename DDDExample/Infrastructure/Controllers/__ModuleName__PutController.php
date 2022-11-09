<?php

declare(strict_types = 1);

namespace __BasePath__\__ModuleName__\Infrastructure\Controllers;

use __BasePath__\__ModuleName__\Application\Request\Update__ModuleName__Request;
use __BasePath__\__ModuleName__\Application\UseCases\Update__ModuleName__;

use Src\Shared\Infrastructure\Controllers\ReturnsMiddleware;
use Symfony\Component\HttpFoundation\JsonResponse;

final class __ModuleName__PutController extends ReturnsMiddleware
{
    public function __construct(private Update__ModuleName__ $update)
    {}

    //TODO:: get laravel request
    public function update(int $id, __ModuleName__Request $request): JsonResponse
    {
        $request = $this->mapper($request);
        ($this->update)($id, $request);
        return $this->successResponse('', $id);
    }

    private function mapper(__ModuleName__Request $request): Update__ModuleName__Request
    {

        return new Update__ModuleName__Request(
// -- get value from request in controllers -- //
        );
    }
}
