<?php

namespace Tests\User\Application\Request;

use Src\User\Application\Request\CreateUserRequest;
use Tests\User\Domain\User\ValueObjects\UserUuidVOMother;
use Tests\User\Domain\User\ValueObjects\UserRoleIdVOMother;
use Tests\User\Domain\User\ValueObjects\UserNameVOMother;
use Tests\User\Domain\User\ValueObjects\UserFirstSurnameVOMother;
use Tests\User\Domain\User\ValueObjects\UserSecondSurnameVOMother;
use Tests\User\Domain\User\ValueObjects\UserEmailVOMother;
use Tests\User\Domain\User\ValueObjects\UserAgeVOMother;
use Tests\User\Domain\User\ValueObjects\UserGenderVOMother;
use Tests\User\Domain\User\ValueObjects\UserPasswordVOMother;
use Tests\User\Domain\User\ValueObjects\UserLangVOMother;

final class CreateUserRequestMother
{
    public static function create(
		string $uuid,
		int $role_id,
		string $name,
		?string $first_surname,
		?string $second_surname,
		string $email,
		?int $age,
		?string $gender,
		string $password,
		string $lang

    ): CreateUserRequest
    {
        return new CreateUserRequest(
				$uuid,
				$role_id,
				$name,
				$first_surname,
				$second_surname,
				$email,
				$age,
				$gender,
				$password,
				$lang
        );
    }

    public static function random(): CreateUserRequest
    {
		$uuid = UserUuidVOMother::random()->value();
		$role_id = UserRoleIdVOMother::random()->value();
		$name = UserNameVOMother::random()->value();
		$first_surname = UserFirstSurnameVOMother::random()->value();
		$second_surname = UserSecondSurnameVOMother::random()->value();
		$email = UserEmailVOMother::random()->value();
		$age = UserAgeVOMother::random()->value();
		$gender = UserGenderVOMother::random()->value();
		$password = UserPasswordVOMother::random()->value();
		$lang = UserLangVOMother::random()->value();

        return self::create(
				$uuid,
				$role_id,
				$name,
				$first_surname,
				$second_surname,
				$email,
				$age,
				$gender,
				$password,
				$lang

        );
    }

}
