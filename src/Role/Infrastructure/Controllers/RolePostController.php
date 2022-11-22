<?php

declare(strict_types = 1);

namespace Src\Role\Infrastructure\Controllers;

use Illuminate\Http\Request;
use Src\Role\Application\Request\CreateRoleRequest;
use Src\Role\Application\UseCases\CreateRole;
use Src\Shared\Infrastructure\Controllers\ReturnsMiddleware;
use Symfony\Component\HttpFoundation\JsonResponse;

final class RolePostController extends ReturnsMiddleware
{
    public function __construct(private CreateRole $create)
    {}

    public function create(Request $request): JsonResponse
    {
        $request = $this->mapper($request);
        ($this->create)($request);
        return $this->successResponse('');
    }

    private function mapper(Request $request): CreateRoleRequest
    {
        return new CreateRoleRequest(
			$request->get('name')
        );
    }
}
