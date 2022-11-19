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

    //TODO:: get laravel request
    public function update(int $id, Request $request): JsonResponse
    {
        $request = $this->mapper($request);
        ($this->update)($id, $request);
        return $this->successResponse('', $id);
    }

    private function mapper(Request $request): UpdateUserRequest
    {

        return new UpdateUserRequest(
			$request->get('id'),
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
			$request->get('api_key'),
			$request->get('email_verified_at'),
			$request->get('remember_token'),
			$request->get('last_login'),
			$request->get('active'),
			$request->get('verified'),
			$request->get('created_at'),
			$request->get('updated_at'),

        );
    }
}
