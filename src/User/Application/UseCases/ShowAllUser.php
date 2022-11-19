<?php

declare(strict_types = 1);

namespace Src\User\Application\UseCases;

use Src\User\Application\Response\UserResponse;
use Src\User\Application\Response\UserResponses;
use Src\User\Domain\User\Repositories\UserRepository;

final class ShowAllUser
{
    public function __construct(private UserRepository $repository)
    {}

    public function __invoke(): UserResponses
    {
        return new UserResponses(...$this->map($this->repository->showAll()));
    }

    private function map($users): array
    {
        $user_array = [];
        foreach ($users as $user) {
            $user_array[] = UserResponse::SelfUserResponse($user);
        }
        return $user_array;
    }
}
