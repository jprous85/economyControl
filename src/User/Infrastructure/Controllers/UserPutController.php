<?php

declare(strict_types = 1);

namespace Src\User\Infrastructure\Controllers;

use Illuminate\Http\Request;
use Src\User\Application\Request\UpdateUserRequest;
use Src\User\Application\UseCases\UpdateUser;

use Src\Shared\Infrastructure\Controllers\ReturnsMiddleware;
use Symfony\Component\HttpFoundation\JsonResponse;

final class UserPutController extends ReturnsMiddleware
{
    public function __construct(private UpdateUser $update)
    {}

    public function update(int $id, Request $request): JsonResponse
    {
        $request = $this->mapper($request);
        ($this->update)($id, $request);
        return $this->successResponse('User updated');
    }

    private function mapper(Request $request): UpdateUserRequest
    {

        return new UpdateUserRequest(
			intval($request->get('role_id')),
			$request->get('name'),
			$request->get('first_surname'),
			$request->get('second_surname'),
			$request->get('email'),
			intval($request->get('age')),
			$request->get('gender'),
			$request->get('lang'),
			intval($request->get('active')),
			intval($request->get('verified')),
        );
    }
}
