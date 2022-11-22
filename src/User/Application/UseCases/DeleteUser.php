<?php

declare(strict_types = 1);

namespace Src\User\Application\UseCases;

use Src\User\Application\Request\DeleteUserRequest;
use Src\User\Application\Request\ShowUserRequest;
use Src\User\Domain\User\Repositories\UserRepository;
use Src\User\Domain\User\ValueObjects\UserIdVO;


final class DeleteUser
{
    public function __construct(private UserRepository $repository)
    {
    }

    public function __invoke(DeleteUserRequest $request)
    {
        $showUser = new ShowUser($this->repository);
        $response = ($showUser)(new ShowUserRequest($request->getId()));

        $user_id = new UserIdVO($response->getId());
        $this->repository->delete($user_id);
    }
}
