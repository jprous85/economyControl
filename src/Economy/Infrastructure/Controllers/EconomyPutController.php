<?php

declare(strict_types = 1);

namespace Src\Economy\Infrastructure\Controllers;

use JsonException;
use Src\Economy\Application\Request\AddEconomyExpensesRequest;
use Src\Economy\Application\Request\AddEconomyIncomeRequest;
use Src\Economy\Application\Request\EconomyIdRequest;
use Src\Economy\Application\Request\EconomyPaidStatusRequest;
use Src\Economy\Application\Request\EconomyUuidRequest;
use Src\Economy\Application\Request\UpdateEconomyRequest;
use Src\Economy\Application\Response\EconomyResponse;
use Src\Economy\Application\UseCases\AddExpenses;
use Src\Economy\Application\UseCases\AddIncome;
use Src\Economy\Application\UseCases\ChangePaidStatus;
use Src\Economy\Application\UseCases\DeleteEconomyManagementRegister;
use Src\Economy\Application\UseCases\ShowEconomyById;
use Src\Economy\Application\UseCases\UpdateEconomy;
use Src\Shared\Infrastructure\Controllers\ReturnsMiddleware;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

final class EconomyPutController extends ReturnsMiddleware
{
    private const INCOMES = 'incomes';
    private const EXPENSES = 'expenses';

    public function __construct(
        private UpdateEconomy $update,
        private ShowEconomyById $showEconomyById,
        private AddIncome $addIncome,
        private AddExpenses $addExpenses,
        private DeleteEconomyManagementRegister $deleteEconomyManagementRegister,
        private ChangePaidStatus $changePaidStatus
    )
    {}

    public function update(int $id, Request $request): JsonResponse
    {
        $request = $this->mapper($request);
        ($this->update)($id, $request);
        return $this->successResponse('Economy updated');
    }

    /**
     * @throws JsonException
     */
    public function addIncome(int $id, Request $request)
    {
        $economy = EconomyResponse::responseToEntity(($this->showEconomyById)(new EconomyIdRequest($id)));
        $addEconomyRequest = new AddEconomyIncomeRequest(
            $request->get('uuid'),
            $request->get('name'),
            $request->get('category'),
            floatval($request->get('amount')),
            $request->get('active')
        );
        ($this->addIncome)($economy, $addEconomyRequest);
    }

    /**
     * @throws JsonException
     */
    public function addSpent(int $id, Request $request)
    {
        $economy = EconomyResponse::responseToEntity(($this->showEconomyById)(new EconomyIdRequest($id)));
        $addEconomyRequest = new AddEconomyExpensesRequest(
            $request->get('uuid'),
            $request->get('name'),
            $request->get('category'),
            floatval($request->get('amount')),
            $request->get('paid'),
            $request->get('active')
        );
        ($this->addExpenses)($economy, $addEconomyRequest);
    }

    public function deleteIncomeRegisterManagement(int $id, Request $request)
    {
        $uuid = $request->get('uuid');
        $economy = EconomyResponse::responseToEntity(($this->showEconomyById)(new EconomyIdRequest($id)));
        $addEconomyRequest = new EconomyUuidRequest($uuid);
        ($this->deleteEconomyManagementRegister)($economy, self::INCOMES, $addEconomyRequest);
    }

    public function deleteSpentRegisterManagement(int $id, Request $request)
    {
        $uuid = $request->get('uuid');
        $economy = EconomyResponse::responseToEntity(($this->showEconomyById)(new EconomyIdRequest($id)));
        $addEconomyRequest = new EconomyUuidRequest($uuid);
        ($this->deleteEconomyManagementRegister)($economy, self::EXPENSES, $addEconomyRequest);
    }

    /**
     * @throws JsonException
     */
    public function changePaidStatus(int $id, Request $request)
    {
        $uuid = $request->get('uuid');
        $status = $request->get('status');
        $economy = EconomyResponse::responseToEntity(($this->showEconomyById)(new EconomyIdRequest($id)));
        $paidStatusRequest = new EconomyPaidStatusRequest($uuid, $status);
        ($this->changePaidStatus)($economy, $paidStatusRequest);
    }

    private function mapper(Request $request): UpdateEconomyRequest
    {
        return new UpdateEconomyRequest(
			$request->get('start_month'),
			$request->get('end_month'),
			$request->get('account_uuid'),
			$request->get('economic_management'),
			intval($request->get('active'))
        );
    }
}
