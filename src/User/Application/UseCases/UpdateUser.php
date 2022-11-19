<?php

declare(strict_types = 1);

namespace Src\User\Application\UseCases;

use Src\User\Application\Request\ShowUserRequest;
use Src\User\Application\Request\UpdateUserRequest;
use Src\User\Application\Response\UserResponse;
use Src\User\Domain\User\Repositories\UserRepository;
use Src\User\Domain\User\User;
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


final class UpdateUser
{
    private ShowUser $show__user;
    public function __construct(private UserRepository $repository, private EventBus $eventBus)
    {
        $this->show__user = new ShowUser($this->repository);
    }

    public function __invoke(int $id, UpdateUserRequest $request)
    {
        $response = ($this->show__user)(new ShowUserRequest($id));
        $user = UserResponse::responseToEntity($response);

        $user = $this->mapper($user, $request);
        $this->repository->update($user);
        $this->eventBus->publish(...$user->pullDomainEvents());
    }

    private function mapper(User $user, $request): User
    {
			$id = $request->getId() ? new UserIdVO($request->getId()) : $user->getId();
			$uuid = $request->getUuid() ? new UserUuidVO($request->getUuid()) : $user->getUuid();
			$role_id = $request->getRoleId() ? new UserRoleIdVO($request->getRoleId()) : $user->getRole();
			$name = $request->getName() ? new UserNameVO($request->getName()) : $user->getName();
			$first_surname = $request->getFirstSurname() ? new UserFirstSurnameVO($request->getFirstSurname()) : $user->getFirstSurname();
			$second_surname = $request->getSecondSurname() ? new UserSecondSurnameVO($request->getSecondSurname()) : $user->getSecondSurname();
			$email = $request->getEmail() ? new UserEmailVO($request->getEmail()) : $user->getEmail();
			$age = $request->getAge() ? new UserAgeVO($request->getAge()) : $user->getAge();
			$gender = $request->getGender() ? new UserGenderVO($request->getGender()) : $user->getGender();
			$password = $request->getPassword() ? new UserPasswordVO($request->getPassword()) : $user->getPassword();
			$lang = $request->getLang() ? new UserLangVO($request->getLang()) : $user->getLang();
			$api_key = $request->getApiKey() ? new UserApiKeyVO($request->getApiKey()) : $user->getApiKey();
			$email_verified_at = $request->getEmailVerifiedAt() ? new UserEmailVerifiedAtVO($request->getEmailVerifiedAt()) : $user->getEmailVerifiedAt();
			$remember_token = $request->getRememberToken() ? new UserRememberTokenVO($request->getRememberToken()) : $user->getRememberToken();
			$last_login = $request->getLastLogin() ? new UserLastLoginVO($request->getLastLogin()) : $user->getLastLogin();
			$active = $request->getActive() ? new UserActiveVO($request->getActive()) : $user->getActive();
			$verified = $request->getVerified() ? new UserVerifiedVO($request->getVerified()) : $user->getVerified();
			$created_at = $request->getCreatedAt() ? new UserCreatedAtVO($request->getCreatedAt()) : $user->getCreatedAt();
			$updated_at = $request->getUpdatedAt() ? new UserUpdatedAtVO($request->getUpdatedAt()) : $user->getUpdatedAt();

        $user->update(
				$id,
				$uuid,
				$role_id,
				$name,
				$first_surname,
				$second_surname,
				$email,
				$age,
				$gender,
				$password,
				$lang,
				$api_key,
				$email_verified_at,
				$remember_token,
				$last_login,
				$active,
				$verified,
				$created_at,
				$updated_at,

        );

        return $user;
    }
}
