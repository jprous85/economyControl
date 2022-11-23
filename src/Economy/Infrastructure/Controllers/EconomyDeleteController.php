<?php

declare(strict_types = 1);

namespace Src\Economy\Infrastructure\Controllers;

use Src\Economy\Application\Request\DeleteEconomyRequest;
use Src\Economy\Application\UseCases\DeleteEconomy;

use Src\Shared\Infrastructure\Controllers\ReturnsMiddleware;
use Symfony\Component\HttpFoundation\JsonResponse;

final class EconomyDeleteController extends ReturnsMiddleware
{
    public function __construct(private DeleteEconomy $delete)
    {}

    public function delete(int $id): JsonResponse
    {
        $request = new DeleteEconomyRequest($id);
        ($this->delete)($request);
        return $this->successResponse('', $id);
    }
}
