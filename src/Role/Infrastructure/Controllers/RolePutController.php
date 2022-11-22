<?php

declare(strict_types=1);

namespace Src\Role\Infrastructure\Controllers;

use Illuminate\Http\Request;
use Src\Role\Application\Request\UpdateRoleRequest;
use Src\Role\Application\UseCases\UpdateRole;

use Src\Shared\Infrastructure\Controllers\ReturnsMiddleware;
use Symfony\Component\HttpFoundation\JsonResponse;

final class RolePutController extends ReturnsMiddleware
{
    public function __construct(private UpdateRole $update)
    {
    }

    public function update(int $id, Request $request): JsonResponse
    {
        $request = $this->mapper($request);
        ($this->update)($id, $request);
        return $this->successResponse('');
    }

    private function mapper(Request $request): UpdateRoleRequest
    {
        return new UpdateRoleRequest(
            $request->get('name'),
            $request->get('active')
        );
    }
}
