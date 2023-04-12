<?php

declare(strict_types = 1);

namespace Src\User\Application\UseCases;

use Src\User\Application\Request\ShowUserUuidRequest;
use Src\User\Application\Response\UserResponse;
use Src\User\Domain\User\Repositories\UserRepository;
use Src\User\Domain\User\ValueObjects\UserUuidVO;


final class ShowUserByUuid
{
    public function __construct(private UserRepository $repository)
    {}

    public function __invoke(ShowUserUuidRequest $uuid): UserResponse
    {
        $userID = new UserUuidVO($uuid->getUuid());
        $user = $this->repository->byUuid($userID);
        return UserResponse::SelfUserResponse($user);
    }
}
