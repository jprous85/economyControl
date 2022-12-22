<?php

declare(strict_types = 1);

namespace Src\User\Infrastructure\Controllers;

use Src\User\Application\Request\DeleteUserRequest;
use Src\User\Application\UseCases\DeleteUser;

use Src\Shared\Infrastructure\Controllers\ReturnsMiddleware;
use Symfony\Component\HttpFoundation\JsonResponse;

final class UserDeleteController extends ReturnsMiddleware
{
    public function __construct(private DeleteUser $delete)
    {}

    public function delete(int $id): JsonResponse
    {
        $request = new DeleteUserRequest($id);
        ($this->delete)($request);
        return $this->successResponse('User deleted');
    }
}
