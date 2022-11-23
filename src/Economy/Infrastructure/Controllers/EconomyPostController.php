<?php

declare(strict_types = 1);

namespace Src\Economy\Infrastructure\Controllers;

use Src\Economy\Application\Request\CreateEconomyRequest;
use Src\Economy\Application\UseCases\CreateEconomy;
use Src\Shared\Infrastructure\Controllers\ReturnsMiddleware;
use Symfony\Component\HttpFoundation\JsonResponse;

final class EconomyPostController extends ReturnsMiddleware
{
    public function __construct(private CreateEconomy $create)
    {}

    //TODO:: get laravel request
    public function create(EconomyRequest $request): JsonResponse
    {
        $request = $this->mapper($request);
        $economy_id = ($this->create)($request);
        return $this->successResponse('', $economy_id);
    }

    private function mapper(EconomyRequest $request): CreateEconomyRequest
    {
        return new CreateEconomyRequest(
			$request->get('id'),
			$request->get('start_month'),
			$request->get('end_month'),
			$request->get('account_id'),
			$request->get('economic_management'),
			$request->get('active'),
			$request->get('created_at'),
			$request->get('updated_at'),

        );
    }
}
