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

    //TODO:: get laravel request
    public function create(Request $request): JsonResponse
    {
        $request = $this->mapper($request);
        $user_id = ($this->create)($request);
        return $this->successResponse('', $user_id);
    }

    private function mapper(Request $request): CreateUserRequest
    {
        return new CreateUserRequest(
			$request->get('uuid'),
			$request->get('role_id'),
			$request->get('name'),
			$request->get('first_surname'),
			$request->get('second_surname'),
			$request->get('email'),
			$request->get('age'),
			$request->get('gender'),
			$request->get('password'),
			$request->get('lang'),

        );
    }
}
