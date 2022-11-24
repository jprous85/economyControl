<?php

declare(strict_types=1);


namespace Src\User\Application\UseCases;


use Src\User\Application\Response\UserResponse;
use Src\User\Application\Response\UserResponses;
use Src\User\Domain\User\Repositories\UserRepository;
use Src\User\Domain\User\User;

final class GetAccountUsers
{
    public function __construct(private UserRepository $repository)
    {}

    public function __invoke(array $users): UserResponses
    {
        return new UserResponses(...$this->map($this->repository->getAccountUsers($users)));
    }

    private function map($users): array
    {
        $user_array = [];

        /**
         * @var User $user
         */
        foreach ($users as $user) {
            $user_array[] = UserResponse::SelfUserResponse($user);
        }
        return $user_array;
    }
}
