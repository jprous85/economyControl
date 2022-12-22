<?php

declare(strict_types = 1);

namespace Src\User\Infrastructure\Controllers;

use Illuminate\Http\Request;
use Src\User\Application\Request\CreateUserRequest;
use Src\User\Application\UseCases\CreateUser;
use Src\Shared\Infrastructure\Controllers\ReturnsMiddleware;
use Symfony\Component\HttpFoundation\JsonResponse;

final class UserPostController extends ReturnsMiddleware
{
    public function __construct(private CreateUser $create)
    {}

    public function create(Request $request): JsonResponse
    {
        $request = $this->mapper($request);
        ($this->create)($request);
        return $this->successResponse('user created');
    }

    private function mapper(Request $request): CreateUserRequest
    {
        return new CreateUserRequest(
			$request->get('uuid'),
			intval($request->get('roleId')),
			$request->get('name'),
			$request->get('firstSurname'),
			$request->get('secondSurname'),
			$request->get('email'),
			intval($request->get('age')),
			$request->get('gender'),
			$request->get('lang'),
        );
    }
}
