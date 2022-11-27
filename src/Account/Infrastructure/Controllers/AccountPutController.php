<?php

declare(strict_types=1);

namespace Src\Account\Infrastructure\Controllers;

use JsonException;
use Src\Account\Application\Request\ModifyUserAccountRequest;
use Src\Account\Application\Request\UpdateAccountRequest;
use Src\Account\Application\UseCases\DeleteUserAccount;
use Src\Account\Application\UseCases\InsertUserAccount;
use Src\Account\Application\UseCases\UpdateAccount;

use Src\Shared\Infrastructure\Controllers\ReturnsMiddleware;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

final class AccountPutController extends ReturnsMiddleware
{
    public function __construct(
        private UpdateAccount $update,
        private InsertUserAccount $insertUserAccount,
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

    /**
     * @throws JsonException
     */
    public function insertUserAccount(int $id, int $userId)
    {
        $insertUserAccountRequest = new ModifyUserAccountRequest($id, $userId);
        ($this->insertUserAccount)($insertUserAccountRequest);
    }

    /**
     * @throws JsonException
     */
    public function deleteUserAccount(int $id, int $userId)
    {
        $deleteUserAccountRequest = new ModifyUserAccountRequest($id, $userId);
        ($this->deleteUserAccount)($deleteUserAccountRequest);
    }

    private function mapper(Request $request): UpdateAccountRequest
    {
        return new UpdateAccountRequest(
            $request->get('name'),
            $request->get('users'),
            $request->get('ownersAccount'),
            $request->get('active')
        );
    }
}
