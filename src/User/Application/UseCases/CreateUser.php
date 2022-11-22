<?php

declare(strict_types = 1);

namespace Src\User\Application\UseCases;

use Src\User\Application\Request\CreateUserRequest;
use Src\User\Domain\User\User;
use Src\User\Domain\User\Repositories\UserRepository;

use Src\User\Domain\User\ValueObjects\UserUuidVO;
use Src\User\Domain\User\ValueObjects\UserRoleIdVO;
use Src\User\Domain\User\ValueObjects\UserNameVO;
use Src\User\Domain\User\ValueObjects\UserFirstSurnameVO;
use Src\User\Domain\User\ValueObjects\UserSecondSurnameVO;
use Src\User\Domain\User\ValueObjects\UserEmailVO;
use Src\User\Domain\User\ValueObjects\UserAgeVO;
use Src\User\Domain\User\ValueObjects\UserGenderVO;
use Src\User\Domain\User\ValueObjects\UserPasswordVO;
use Src\User\Domain\User\ValueObjects\UserLangVO;


final class CreateUser
{

    public function __construct(private UserRepository $repository)
    {
    }

    public function __invoke(CreateUserRequest $request): int
    {
        $user = self::mapper($request);
        $user_id = $this->repository->save($user);
        return $user_id->value();
    }

    private function mapper(CreateUserRequest $request): User
    {
        return User::create(
			new UserUuidVO($request->getUuid()),
			new UserRoleIdVO($request->getRoleId()),
			new UserNameVO($request->getName()),
			new UserFirstSurnameVO($request->getFirstSurname()),
			new UserSecondSurnameVO($request->getSecondSurname()),
			new UserEmailVO($request->getEmail()),
			new UserAgeVO($request->getAge()),
			new UserGenderVO($request->getGender()),
			new UserPasswordVO($request->getPassword()),
			new UserLangVO($request->getLang()),
        );
    }
}
