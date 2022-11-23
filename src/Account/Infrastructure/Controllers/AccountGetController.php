<?php

declare(strict_types=1);

namespace Src\Account\Infrastructure\Controllers;

use Src\Account\Application\Request\ShowAccountRequest;
use Src\Account\Application\UseCases\ShowAllAccount;
use Src\Account\Application\UseCases\ShowAccount;

use Src\Shared\Infrastructure\Controllers\ReturnsMiddleware;
use Symfony\Component\HttpFoundation\JsonResponse;

final class AccountGetController extends ReturnsMiddleware
{
    public function __construct(
        private ShowAccount $show_account,
        private ShowAllAccount $show_all_account
    ) {
    }

    public function show(int $id): JsonResponse
    {
        $request = new ShowAccountRequest($id);
        return $this->successArrayResponse(($this->show_account)($request)->toArray());
    }

    public function read(): JsonResponse
    {
        return $this->successArrayResponse(($this->show_all_account)()->toArray());
    }
}
