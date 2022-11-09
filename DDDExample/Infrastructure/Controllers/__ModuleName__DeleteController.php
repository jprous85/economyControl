<?php

declare(strict_types = 1);

namespace __BasePath__\__ModuleName__\Infrastructure\Controllers;

use __BasePath__\__ModuleName__\Application\Request\Delete__ModuleName__Request;
use __BasePath__\__ModuleName__\Application\UseCases\Delete__ModuleName__;

use Src\Shared\Infrastructure\Controllers\ReturnsMiddleware;
use Symfony\Component\HttpFoundation\JsonResponse;

final class __ModuleName__DeleteController extends ReturnsMiddleware
{
    public function __construct(private Delete__ModuleName__ $delete)
    {}

    public function delete(int $id): JsonResponse
    {
        $request = new Delete__ModuleName__Request($id);
        ($this->delete)($request);
        return $this->successResponse('', $id);
    }
}
