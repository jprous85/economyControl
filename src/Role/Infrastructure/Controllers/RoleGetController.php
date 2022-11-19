<?php

declare(strict_types=1);

namespace Src\Role\Infrastructure\Controllers;

use Src\Role\Application\Request\ShowRoleRequest;
use Src\Role\Application\UseCases\ShowAllRole;
use Src\Role\Application\UseCases\ShowRole;

use Src\Shared\Infrastructure\Controllers\ReturnsMiddleware;
use Symfony\Component\HttpFoundation\JsonResponse;

final class RoleGetController extends ReturnsMiddleware
{
    public function __construct(
        private ShowRole $show_role,
        private ShowAllRole $show_all_role
    ) {
    }

    public function show(int $id): JsonResponse
    {
        $request = new ShowRoleRequest($id);
        return $this->successArrayResponse(($this->show_role)($request)->toArray());
    }

    public function read(): JsonResponse
    {
        return $this->successArrayResponse(($this->show_all_role)()->toArray());
    }
}
