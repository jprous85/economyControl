<?php

declare(strict_types=1);

namespace Src\User\Infrastructure\Controllers;

use JsonException;
use Src\User\Application\Request\ShowUserRequest;
use Src\User\Application\UseCases\GetAccountUsers;
use Src\User\Application\UseCases\ShowAllUser;
use Src\User\Application\UseCases\ShowUser;

use Src\Shared\Infrastructure\Controllers\ReturnsMiddleware;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

final class UserGetController extends ReturnsMiddleware
{
    public function __construct(
        private ShowUser $show_user,
        private ShowAllUser $show_all_user,
        private GetAccountUsers $accountUsers
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

    /**
     * @throws JsonException
     */
    public function accountUsers(Request $request): JsonResponse
    {
        $usersCollection = $request->get('users');

        $users = json_decode($usersCollection, true, JSON_PARTIAL_OUTPUT_ON_ERROR, JSON_THROW_ON_ERROR);

        return $this->successArrayResponse(($this->accountUsers)($users)->toArray());
    }
}
