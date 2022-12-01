<?php

declare(strict_types = 1);

namespace Src\Economy\Infrastructure\Controllers;

use Src\Economy\Application\Request\AddEconomyIncomeRequest;
use Src\Economy\Application\Request\CreateEconomyRequest;
use Src\Economy\Application\Request\ShowEconomyRequest;
use Src\Economy\Application\Response\EconomyResponse;
use Src\Economy\Application\UseCases\AddIncome;
use Src\Economy\Application\UseCases\CreateEconomy;
use Src\Economy\Application\UseCases\ShowEconomy;
use Src\Shared\Infrastructure\Controllers\ReturnsMiddleware;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

final class EconomyPostController extends ReturnsMiddleware
{
    public function __construct(
        private CreateEconomy $create,
        private ShowEconomy $showEconomy,
        private AddIncome $addIncome
    )
    {}

    public function create(Request $request): JsonResponse
    {
        $request = $this->mapper($request);
        ($this->create)($request);
        return $this->successResponse('');
    }

    public function addIncome(int $id, Request $request)
    {
        $economy = EconomyResponse::responseToEntity(($this->showEconomy)(new ShowEconomyRequest($id)));
        $addEconomyRequest = new AddEconomyIncomeRequest(
            $request->get('uuid'),
            $request->get('name'),
            floatval($request->get('amount')),
            $request->get('active')
        );
       ($this->addIncome)($economy, $addEconomyRequest);
    }

    private function mapper(Request $request): CreateEconomyRequest
    {
        return new CreateEconomyRequest(
			$request->get('start_month'),
			$request->get('end_month'),
			intval($request->get('account_id')),
        );
    }
}
