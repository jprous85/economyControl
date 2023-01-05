<?php

namespace Tests\User\Application\Request;

use Src\User\Application\Request\UpdateUserRequest;
use Tests\User\Domain\User\ValueObjects\UserRoleIdVOMother;
use Tests\User\Domain\User\ValueObjects\UserNameVOMother;
use Tests\User\Domain\User\ValueObjects\UserFirstSurnameVOMother;
use Tests\User\Domain\User\ValueObjects\UserSecondSurnameVOMother;
use Tests\User\Domain\User\ValueObjects\UserEmailVOMother;
use Tests\User\Domain\User\ValueObjects\UserAgeVOMother;
use Tests\User\Domain\User\ValueObjects\UserGenderVOMother;
use Tests\User\Domain\User\ValueObjects\UserLangVOMother;
use Tests\User\Domain\User\ValueObjects\UserActiveVOMother;
use Tests\User\Domain\User\ValueObjects\UserVerifiedVOMother;


final class UpdateUserRequestMother
{
    public static function create(
		int $role_id,
		string $name,
		?string $first_surname,
		?string $second_surname,
		string $email,
		?int $age,
		?string $gender,
		string $lang,
		int $active,
		int $verified

    ): UpdateUserRequest
    {
        return new UpdateUserRequest(
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
    }

    public static function random(): UpdateUserRequest
    {
		$role_id = UserRoleIdVOMother::random()->value();
		$name = UserNameVOMother::random()->value();
		$first_surname = UserFirstSurnameVOMother::random()->value();
		$second_surname = UserSecondSurnameVOMother::random()->value();
		$email = UserEmailVOMother::random()->value();
		$age = UserAgeVOMother::random()->value();
		$gender = UserGenderVOMother::random()->value();
		$lang = UserLangVOMother::random()->value();
		$active = UserActiveVOMother::random()->value();
		$verified = UserVerifiedVOMother::random()->value();

        return self::create(
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
    }

}
