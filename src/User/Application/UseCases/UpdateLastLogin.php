<?php

declare(strict_types=1);


namespace Src\User\Application\UseCases;


use Src\User\Application\Request\ShowUserRequest;
use Src\User\Domain\User\Repositories\UserRepository;
use Src\User\Domain\User\ValueObjects\UserIdVO;

final class UpdateLastLogin
{

    public function __construct(private UserRepository $repository)
    {
    }

    public function __invoke(ShowUserRequest $request)
    {
        $user = $this->repository->show(new UserIdVO($request->getId()));
        $user->updateLastLogin();
        $this->repository->update($user);
    }
}
