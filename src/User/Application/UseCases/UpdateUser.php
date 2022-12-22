<?php

declare(strict_types = 1);

namespace Src\User\Application\UseCases;

use Src\User\Application\Request\ShowUserRequest;
use Src\User\Application\Request\UpdateUserRequest;
use Src\User\Application\Response\UserResponse;
use Src\User\Domain\User\Repositories\UserRepository;
use Src\User\Domain\User\User;

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
use Src\User\Domain\User\ValueObjects\UserActiveVO;
use Src\User\Domain\User\ValueObjects\UserVerifiedVO;


final class UpdateUser
{
    private ShowUser $showUser;
    public function __construct(private UserRepository $repository)
    {
        $this->showUser = new ShowUser($this->repository);
    }

    public function __invoke(int $id, UpdateUserRequest $request)
    {
        $response = ($this->showUser)(new ShowUserRequest($id));
        $user = UserResponse::responseToEntity($response);

        $user = $this->mapper($user, $request);
        $this->repository->update($user);
    }

    private function mapper(User $user, $request): User
    {
			$role_id = $request->getRoleId() ? new UserRoleIdVO($request->getRoleId()) : $user->getRoleId();
			$name = $request->getName() ? new UserNameVO($request->getName()) : $user->getName();
			$first_surname = $request->getFirstSurname() ? new UserFirstSurnameVO($request->getFirstSurname()) : $user->getFirstSurname();
			$second_surname = $request->getSecondSurname() ? new UserSecondSurnameVO($request->getSecondSurname()) : $user->getSecondSurname();
			$email = $request->getEmail() ? new UserEmailVO($request->getEmail()) : $user->getEmail();
			$age = $request->getAge() ? new UserAgeVO($request->getAge()) : $user->getAge();
			$gender = $request->getGender() ? new UserGenderVO($request->getGender()) : $user->getGender();
			$lang = $request->getLang() ? new UserLangVO($request->getLang()) : $user->getLang();
			$active = $request->getActive() ? new UserActiveVO($request->getActive()) : $user->getActive();
			$verified = $request->getVerified() ? new UserVerifiedVO($request->getVerified()) : $user->getVerified();

        $user->update(
				$role_id,
				$name,
				$first_surname,
				$second_surname,
				$email,
				$age,
				$gender,
				$lang,
				$active,
				$verified
        );

        return $user;
    }
}
