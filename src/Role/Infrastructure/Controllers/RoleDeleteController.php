<?php

declare(strict_types = 1);

namespace Src\Role\Infrastructure\Controllers;

use Src\Role\Application\Request\DeleteRoleRequest;
use Src\Role\Application\UseCases\DeleteRole;

use Src\Shared\Infrastructure\Controllers\ReturnsMiddleware;
use Symfony\Component\HttpFoundation\JsonResponse;

final class RoleDeleteController extends ReturnsMiddleware
{
    public function __construct(private DeleteRole $delete)
    {}

    public function delete(int $id): JsonResponse
    {
        $request = new DeleteRoleRequest($id);
        ($this->delete)($request);
        return $this->successResponse('', $id);
    }
}
