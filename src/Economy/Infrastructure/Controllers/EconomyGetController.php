<?php

declare(strict_types=1);

namespace Src\Economy\Infrastructure\Controllers;

use Src\Economy\Application\Request\EconomyAccountUuidRequest;
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

    public function show(string $accountUuid): JsonResponse
    {
        try {
            $request = new EconomyAccountUuidRequest($accountUuid);
            $economy = ($this->show_economy)($request);
            if ($economy) {
                return $this->successArrayResponse($economy->toArray());
            }

            return $this->successResponse('there not economy exist');

        } catch (\Exception $e) {
            return $this->successArrayResponse(['message' => $e->getMessage(), 'status' => 404]);
        }
    }

    public function read(): JsonResponse
    {
        try {
            return $this->successArrayResponse(($this->show_all_economy)()->toArray());
        } catch (\Exception $e) {
            return $this->error500Response($e->getMessage());
        }
    }
}
