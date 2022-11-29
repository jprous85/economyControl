<?php

declare(strict_types = 1);

namespace Src\Account\Infrastructure\Controllers;

use Illuminate\Support\Facades\Auth;
use Src\Account\Application\Request\CreateAccountRequest;
use Src\Account\Application\UseCases\CreateAccount;
use Src\Shared\Infrastructure\Controllers\ReturnsMiddleware;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

final class AccountPostController extends ReturnsMiddleware
{
    public function __construct(private CreateAccount $create)
    {}

    public function create(Request $request): JsonResponse
    {
        $request = $this->mapper($request);
        ($this->create)($request);
        return $this->createdResponse('Account created');
    }

    private function mapper(Request $request): CreateAccountRequest
    {
        return new CreateAccountRequest(
			$request->get('name'),
            "[" . Auth::id() . "]",
			"[" . Auth::id() . "]"
        );
    }
}
