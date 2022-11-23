<?php

declare(strict_types = 1);

namespace Src\Account\Infrastructure\Controllers;

use Src\Account\Application\Request\UpdateAccountRequest;
use Src\Account\Application\UseCases\UpdateAccount;

use Src\Shared\Infrastructure\Controllers\ReturnsMiddleware;
use Symfony\Component\HttpFoundation\JsonResponse;

final class AccountPutController extends ReturnsMiddleware
{
    public function __construct(private UpdateAccount $update)
    {}

    //TODO:: get laravel request
    public function update(int $id, AccountRequest $request): JsonResponse
    {
        $request = $this->mapper($request);
        ($this->update)($id, $request);
        return $this->successResponse('', $id);
    }

    private function mapper(AccountRequest $request): UpdateAccountRequest
    {

        return new UpdateAccountRequest(
			$request->get('id'),
			$request->get('name'),
			$request->get('users'),
			$request->get('active'),
			$request->get('created_at'),
			$request->get('updated_at'),

        );
    }
}
