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

    public function update(string $uuid, Request $request): JsonResponse
    {
        $request = $this->mapper($request);
        ($this->update)($uuid, $request);
        return $this->successResponse('Account updated');
    }

    /**
     * @throws JsonException
     */
    public function insertUserAccount(string $uuid, int $userId): JsonResponse
    {
        $insertUserAccountRequest = new ModifyUserAccountRequest($uuid, $userId);
        ($this->insertUserAccount)($insertUserAccountRequest);
        return $this->successResponse('Account updated');
    }

    /**
     * @throws JsonException
     */
    public function deleteUserAccount(string $uuid, int $userId): JsonResponse
    {
        $deleteUserAccountRequest = new ModifyUserAccountRequest($uuid, $userId);
        ($this->deleteUserAccount)($deleteUserAccountRequest);
        return $this->successResponse('Account updated');
    }

    /**
     * @throws JsonException
     */
    public function insertOwnerAccount(string $uuid, int $userId): JsonResponse
    {
        $insertUserAccountRequest = new ModifyOwnerAccountRequest($uuid, $userId);
        ($this->insertOwnerAccount)($insertUserAccountRequest);
        return $this->successResponse('Account updated');
    }

    /**
     * @throws JsonException
     */
    public function deleteOwnerAccount(string $uuid, int $userId): JsonResponse
    {
        $deleteUserAccountRequest = new ModifyOwnerAccountRequest($uuid, $userId);
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
