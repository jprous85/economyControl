<?php

declare(strict_types=1);

namespace Src\Account\Infrastructure\Controllers;

use JsonException;
use Src\Account\Application\Request\ModifyOwnerAccountRequest;
use Src\Account\Application\Request\ModifyUserAccountRequest;
use Src\Account\Application\Request\UpdateAccountRequest;
use Src\Account\Application\UseCases\DeleteOwnerAccount;
use Src\Account\Application\UseCases\DeleteUserAccount;
use Src\Account\Application\UseCases\InsertOwnerAccount;
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
        private DeleteUserAccount $deleteUserAccount,
        private InsertOwnerAccount $insertOwnerAccount,
        private DeleteOwnerAccount $deleteOwnerAccount,
    )
    {
    }

    public function update(int $id, Request $request): JsonResponse
    {
        $request = $this->mapper($request);
        ($this->update)($id, $request);
        return $this->successResponse('Account updated');
    }

    /**
     * @throws JsonException
     */
    public function insertUserAccount(int $id, int $userId): JsonResponse
    {
        $insertUserAccountRequest = new ModifyUserAccountRequest($id, $userId);
        ($this->insertUserAccount)($insertUserAccountRequest);
        return $this->successResponse('Account updated');
    }

    /**
     * @throws JsonException
     */
    public function deleteUserAccount(int $id, int $userId): JsonResponse
    {
        $deleteUserAccountRequest = new ModifyUserAccountRequest($id, $userId);
        ($this->deleteUserAccount)($deleteUserAccountRequest);
        return $this->successResponse('Account updated');
    }

    /**
     * @throws JsonException
     */
    public function insertOwnerAccount(int $id, int $userId): JsonResponse
    {
        $insertUserAccountRequest = new ModifyOwnerAccountRequest($id, $userId);
        ($this->insertOwnerAccount)($insertUserAccountRequest);
        return $this->successResponse('Account updated');
    }

    /**
     * @throws JsonException
     */
    public function deleteOwnerAccount(int $id, int $userId): JsonResponse
    {
        $deleteUserAccountRequest = new ModifyOwnerAccountRequest($id, $userId);
        ($this->deleteOwnerAccount)($deleteUserAccountRequest);
        return $this->successResponse('Account updated');
    }

    private function mapper(Request $request): UpdateAccountRequest
    {
        return new UpdateAccountRequest(
            $request->get('name'),
            $request->get('description'),
            intval($request->get('active'))
        );
    }
}
