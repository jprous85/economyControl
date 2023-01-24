<?php

declare(strict_types = 1);

namespace Src\Economy\Infrastructure\Controllers;

use JsonException;
use Src\Economy\Application\Request\AddEconomyExpensesRequest;
use Src\Economy\Application\Request\AddEconomyIncomeRequest;
use Src\Economy\Application\Request\EconomyFixedStatusRequest;
use Src\Economy\Application\Request\EconomyIdRequest;
use Src\Economy\Application\Request\EconomyPaidStatusRequest;
use Src\Economy\Application\Request\EconomyUuidRequest;
use Src\Economy\Application\Request\UpdateEconomyIncomeManagementRequest;
use Src\Economy\Application\Request\UpdateEconomyRequest;
use Src\Economy\Application\Request\UpdateEconomySpentManagementRequest;
use Src\Economy\Application\Response\EconomyResponse;
use Src\Economy\Application\UseCases\AddExpenses;
use Src\Economy\Application\UseCases\AddIncome;
use Src\Economy\Application\UseCases\ChangeFixedStatus;
use Src\Economy\Application\UseCases\ChangePaidStatus;
use Src\Economy\Application\UseCases\DeleteEconomyManagementRegister;
use Src\Economy\Application\UseCases\ShowEconomyById;
use Src\Economy\Application\UseCases\UpdateEconomy;
use Src\Economy\Application\UseCases\UpdateIncome;
use Src\Economy\Application\UseCases\UpdateSpent;
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
        private UpdateIncome $updateIncome,
        private UpdateSpent $updateSpent,
        private AddExpenses $addExpenses,
        private DeleteEconomyManagementRegister $deleteEconomyManagementRegister,
        private ChangePaidStatus $changePaidStatus,
        private ChangeFixedStatus $changeFixedStatus
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
    public function addIncome(int $id, Request $request): JsonResponse
    {
        $economy = EconomyResponse::responseToEntity(($this->showEconomyById)(new EconomyIdRequest($id)));
        $addEconomyRequest = new AddEconomyIncomeRequest(
            $request->get('uuid'),
            $request->get('name'),
            $request->get('category'),
            floatval($request->get('amount')),
            (bool) $request->get('fixed'),
            (bool) $request->get('active')
        );
        ($this->addIncome)($economy, $addEconomyRequest);
        return $this->createdResponse('Income created');
    }

    /**
     * @throws JsonException
     */
    public function updateIncome(int $id, Request $request): JsonResponse
    {
        $economy = EconomyResponse::responseToEntity(($this->showEconomyById)(new EconomyIdRequest($id)));
        $updateEconomyRequest = new UpdateEconomyIncomeManagementRequest(
            $request->get('uuid'),
            $request->get('name'),
            $request->get('category'),
            floatval($request->get('amount')),
            (bool) $request->get('fixed'),
            (bool) $request->get('active')
        );
        ($this->updateIncome)($economy, $updateEconomyRequest);
        return $this->successResponse('Income updated');
    }

    /**
     * @throws JsonException
     */
    public function addSpent(int $id, Request $request): JsonResponse
    {
        $economy = EconomyResponse::responseToEntity(($this->showEconomyById)(new EconomyIdRequest($id)));
        $addEconomyRequest = new AddEconomyExpensesRequest(
            $request->get('uuid'),
            $request->get('name'),
            $request->get('category'),
            floatval($request->get('amount')),
            (bool) $request->get('paid'),
            (bool) $request->get('fixed'),
            (bool) $request->get('active')
        );
        ($this->addExpenses)($economy, $addEconomyRequest);
        return $this->createdResponse('Spend included');
    }

    /**
     * @throws JsonException
     */
    public function updateSpent(int $id, Request $request): JsonResponse
    {
        $economy = EconomyResponse::responseToEntity(($this->showEconomyById)(new EconomyIdRequest($id)));
        $updateEconomyRequest = new UpdateEconomySpentManagementRequest(
            $request->get('uuid'),
            $request->get('name'),
            $request->get('category'),
            floatval($request->get('amount')),
            (bool) $request->get('paid'),
            (bool) $request->get('fixed'),
            (bool) $request->get('active')
        );
        ($this->updateSpent)($economy, $updateEconomyRequest);
        return $this->successResponse('Spent updated');
    }

    public function deleteIncomeRegisterManagement(int $id, Request $request): JsonResponse
    {
        $uuid = $request->get('uuid');
        $economy = EconomyResponse::responseToEntity(($this->showEconomyById)(new EconomyIdRequest($id)));
        $addEconomyRequest = new EconomyUuidRequest($uuid);
        ($this->deleteEconomyManagementRegister)($economy, self::INCOMES, $addEconomyRequest);
        return $this->successResponse('Income deleted');
    }

    public function deleteSpentRegisterManagement(int $id, Request $request): JsonResponse
    {
        $uuid = $request->get('uuid');
        $economy = EconomyResponse::responseToEntity(($this->showEconomyById)(new EconomyIdRequest($id)));
        $addEconomyRequest = new EconomyUuidRequest($uuid);
        ($this->deleteEconomyManagementRegister)($economy, self::EXPENSES, $addEconomyRequest);
        return $this->successResponse('spent deleted');
    }

    /**
     * @throws JsonException
     */
    public function changePaidStatus(int $id, Request $request): JsonResponse
    {
        $uuid = $request->get('uuid');
        $status = (bool) $request->get('status');
        $economy = EconomyResponse::responseToEntity(($this->showEconomyById)(new EconomyIdRequest($id)));
        $paidStatusRequest = new EconomyPaidStatusRequest($uuid, $status);
        ($this->changePaidStatus)($economy, $paidStatusRequest);
        return $this->successResponse('paid updated');
    }

    /**
     * @throws JsonException
     */
    public function changeFixedStatus(int $id, Request $request): JsonResponse
    {
        $uuid = $request->get('uuid');
        $field = $request->get('field');
        $fixed = (bool) $request->get('fixed');
        $economy = EconomyResponse::responseToEntity(($this->showEconomyById)(new EconomyIdRequest($id)));
        $fixedStatusRequest = new EconomyFixedStatusRequest($uuid, $field, $fixed);
        ($this->changeFixedStatus)($economy, $fixedStatusRequest);
        return $this->successResponse('fixed updated');
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
