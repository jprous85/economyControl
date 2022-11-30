<?php

declare(strict_types = 1);

namespace Src\Economy\Infrastructure\Controllers;

use Src\Economy\Application\Request\UpdateEconomyRequest;
use Src\Economy\Application\UseCases\UpdateEconomy;
use Src\Shared\Infrastructure\Controllers\ReturnsMiddleware;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

final class EconomyPutController extends ReturnsMiddleware
{
    public function __construct(private UpdateEconomy $update)
    {}

    public function update(int $id, Request $request): JsonResponse
    {
        $request = $this->mapper($request);
        ($this->update)($id, $request);
        return $this->successResponse('');
    }

    private function mapper(Request $request): UpdateEconomyRequest
    {

        return new UpdateEconomyRequest(
			$request->get('start_month'),
			$request->get('end_month'),
			intval($request->get('account_id')),
			$request->get('economic_management'),
			intval($request->get('active'))
        );
    }
}
