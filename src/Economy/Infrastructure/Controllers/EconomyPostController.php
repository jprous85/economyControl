<?php

declare(strict_types = 1);

namespace Src\Economy\Infrastructure\Controllers;

use Src\Economy\Application\Request\CreateEconomyRequest;
use Src\Economy\Application\UseCases\CreateEconomy;
use Src\Shared\Infrastructure\Controllers\ReturnsMiddleware;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

final class EconomyPostController extends ReturnsMiddleware
{
    public function __construct(
        private CreateEconomy $create
    )
    {}

    public function create(Request $request): JsonResponse
    {
        $request = $this->mapper($request);
        ($this->create)($request);
        return $this->successResponse('');
    }

    private function mapper(Request $request): CreateEconomyRequest
    {
        return new CreateEconomyRequest(
			$request->get('uuid'),
			$request->get('start_month'),
			$request->get('end_month'),
        );
    }
}
