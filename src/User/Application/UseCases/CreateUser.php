<?php

declare(strict_types = 1);

namespace Src\User\Application\UseCases;

use Src\User\Application\Request\CreateUserRequest;
use Src\User\Domain\User\User;
use Src\User\Domain\User\Repositories\UserRepository;

use Src\Shared\Domain\Bus\Event\EventBus;

use Src\User\Domain\User\ValueObjects\UserIdVO;
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
use Src\User\Domain\User\ValueObjects\UserApiKeyVO;
use Src\User\Domain\User\ValueObjects\UserEmailVerifiedAtVO;
use Src\User\Domain\User\ValueObjects\UserRememberTokenVO;
use Src\User\Domain\User\ValueObjects\UserLastLoginVO;
use Src\User\Domain\User\ValueObjects\UserActiveVO;
use Src\User\Domain\User\ValueObjects\UserVerifiedVO;
use Src\User\Domain\User\ValueObjects\UserCreatedAtVO;
use Src\User\Domain\User\ValueObjects\UserUpdatedAtVO;


final class CreateUser
{

    public function __construct(private UserRepository $repository, private EventBus $eventBus)
    {
    }

    public function __invoke(CreateUserRequest $request): int
    {
        $user = self::mapper($request);
        $user_id = $this->repository->save($user);
        $this->eventBus->publish(...$user->pullDomainEvents());
        return $user_id->value();
    }

    private function mapper(CreateUserRequest $request): User
    {
        // TODO:: check with VO and return it
        return User::create(
			new UserIdVO($request->getId()),
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
			new UserApiKeyVO($request->getApiKey()),
			new UserEmailVerifiedAtVO($request->getEmailVerifiedAt()),
			new UserRememberTokenVO($request->getRememberToken()),
			new UserLastLoginVO($request->getLastLogin()),
			new UserActiveVO($request->getActive()),
			new UserVerifiedVO($request->getVerified()),
			new UserCreatedAtVO($request->getCreatedAt()),
			new UserUpdatedAtVO($request->getUpdatedAt()),

        );
    }
}
