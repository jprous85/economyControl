<?php

declare(strict_types=1);

namespace Src\Economy\Infrastructure\Controllers;

use Src\Economy\Application\Request\ShowEconomyRequest;
use Src\Economy\Application\UseCases\ShowAllEconomy;
use Src\Economy\Application\UseCases\ShowEconomy;

use Src\Shared\Infrastructure\Controllers\ReturnsMiddleware;
use Symfony\Component\HttpFoundation\JsonResponse;

final class EconomyGetController extends ReturnsMiddleware
{
    public function __construct(
        private ShowEconomy $show_economy,
        private ShowAllEconomy $show_all_economy
    ) {
    }

    public function show(int $id): JsonResponse
    {
        try {
            $request = new ShowEconomyRequest($id);
            return $this->successArrayResponse(($this->show_economy)($request)->toArray());
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }

    public function read(): JsonResponse
    {
        try {
            return $this->successArrayResponse(($this->show_all_economy)()->toArray());
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }
}
