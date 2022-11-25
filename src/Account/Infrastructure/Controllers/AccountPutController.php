<?php

declare(strict_types=1);

namespace Src\Account\Infrastructure\Controllers;

use Src\Account\Application\Request\DeleteUserAccountRequest;
use Src\Account\Application\Request\UpdateAccountRequest;
use Src\Account\Application\UseCases\DeleteUserAccount;
use Src\Account\Application\UseCases\UpdateAccount;

use Src\Shared\Infrastructure\Controllers\ReturnsMiddleware;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

final class AccountPutController extends ReturnsMiddleware
{
    public function __construct(
        private UpdateAccount $update,
        private DeleteUserAccount $deleteUserAccount
    )
    {
    }

    public function update(int $id, Request $request): JsonResponse
    {
        $request = $this->mapper($request);
        ($this->update)($id, $request);
        return $this->successResponse('');
    }

    public function deleteUserAccount(int $id, int $userId)
    {
        $deleteUserAccountRequest = new DeleteUserAccountRequest($id, $userId);
        ($this->deleteUserAccount)($deleteUserAccountRequest);
    }

    private function mapper(Request $request): UpdateAccountRequest
    {
        return new UpdateAccountRequest(
            $request->get('name'),
            $request->get('users'),
            $request->get('active')
        );
    }
}
