<?php

declare(strict_types=1);

namespace Src\User\Infrastructure\Controllers;

use Src\User\Application\Request\ShowUserRequest;
use Src\User\Application\UseCases\ShowAllUser;
use Src\User\Application\UseCases\ShowUser;

use Src\Shared\Infrastructure\Controllers\ReturnsMiddleware;
use Symfony\Component\HttpFoundation\JsonResponse;

final class UserGetController extends ReturnsMiddleware
{
    public function __construct(
        private ShowUser $show_user,
        private ShowAllUser $show_all_user
    ) {
    }

    public function show(int $id): JsonResponse
    {
        $request = new ShowUserRequest($id);
        return $this->successArrayResponse(($this->show_user)($request)->toArray());
    }

    public function read(): JsonResponse
    {
        return $this->successArrayResponse(($this->show_all_user)()->toArray());
    }
}
