<?php

declare(strict_types = 1);

namespace Src\Account\Infrastructure\Controllers;

use Src\Account\Application\Request\DeleteAccountRequest;
use Src\Account\Application\UseCases\DeleteAccount;

use Src\Shared\Infrastructure\Controllers\ReturnsMiddleware;
use Symfony\Component\HttpFoundation\JsonResponse;

final class AccountDeleteController extends ReturnsMiddleware
{
    public function __construct(private DeleteAccount $delete)
    {}

    public function delete(int $id): JsonResponse
    {
        $request = new DeleteAccountRequest($id);
        ($this->delete)($request);
        return $this->successResponse('', $id);
    }
}
