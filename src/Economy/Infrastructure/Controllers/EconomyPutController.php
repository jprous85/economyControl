<?php

declare(strict_types = 1);

namespace Src\Economy\Infrastructure\Controllers;

use Src\Economy\Application\Request\UpdateEconomyRequest;
use Src\Economy\Application\UseCases\UpdateEconomy;

use Src\Shared\Infrastructure\Controllers\ReturnsMiddleware;
use Symfony\Component\HttpFoundation\JsonResponse;

final class EconomyPutController extends ReturnsMiddleware
{
    public function __construct(private UpdateEconomy $update)
    {}

    //TODO:: get laravel request
    public function update(int $id, EconomyRequest $request): JsonResponse
    {
        $request = $this->mapper($request);
        ($this->update)($id, $request);
        return $this->successResponse('', $id);
    }

    private function mapper(EconomyRequest $request): UpdateEconomyRequest
    {

        return new UpdateEconomyRequest(
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
