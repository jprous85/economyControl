<?php

declare(strict_types=1);

namespace Src\Account\Infrastructure\Controllers;

use Src\Account\Application\Request\ShowAccountUuidRequest;
use Src\Account\Application\UseCases\DuplicateAccount;
use Src\Account\Application\UseCases\GetAccountByUserId;
use Src\Account\Application\UseCases\ShowAllAccount;
use Src\Account\Application\UseCases\ShowAccount;

use Src\Shared\Infrastructure\Controllers\ReturnsMiddleware;
use Src\User\Application\Request\ShowUserRequest;
use Symfony\Component\HttpFoundation\JsonResponse;

final class AccountGetController extends ReturnsMiddleware
{
    public function __construct(
        private ShowAccount $show_account,
        private ShowAllAccount $show_all_account,
        private GetAccountByUserId $accountByUser,
        private DuplicateAccount $duplicateAccount
    ) {
    }

    public function show(string $uuid): JsonResponse
    {
        $request = new ShowAccountUuidRequest($uuid);
        return $this->successArrayResponse(($this->show_account)($request)->toArray());
    }

    public function read(): JsonResponse
    {
        return $this->successArrayResponse(($this->show_all_account)()->toArray());
    }

    public function getAccountByUser(int $userId): JsonResponse
    {
        $request = new ShowUserRequest($userId);
        return $this->successArrayResponse(($this->accountByUser)($request)->toArray());
    }

    /**
     * @throws \JsonException
     */
    public function duplicate(string $uuid): JsonResponse
    {
        ($this->duplicateAccount)(new ShowAccountUuidRequest($uuid));
        return $this->successResponse('Account duplicated');
    }
}
