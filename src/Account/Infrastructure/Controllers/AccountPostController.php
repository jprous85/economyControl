<?php

declare(strict_types = 1);

namespace Src\Account\Infrastructure\Controllers;

use Src\Account\Application\Request\CreateAccountRequest;
use Src\Account\Application\UseCases\CreateAccount;
use Src\Shared\Infrastructure\Controllers\ReturnsMiddleware;
use Symfony\Component\HttpFoundation\JsonResponse;

final class AccountPostController extends ReturnsMiddleware
{
    public function __construct(private CreateAccount $create)
    {}

    //TODO:: get laravel request
    public function create(AccountRequest $request): JsonResponse
    {
        $request = $this->mapper($request);
        $account_id = ($this->create)($request);
        return $this->successResponse('', $account_id);
    }

    private function mapper(AccountRequest $request): CreateAccountRequest
    {
        return new CreateAccountRequest(
			$request->get('id'),
			$request->get('name'),
			$request->get('users'),
			$request->get('active'),
			$request->get('created_at'),
			$request->get('updated_at'),

        );
    }
}
