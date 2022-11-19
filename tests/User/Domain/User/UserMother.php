<?php

namespace Tests\User\Domain\User;

use Src\User\Domain\User\User;

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

use Tests\User\Domain\User\ValueObjects\UserIdVOMother;
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
use Tests\User\Domain\User\ValueObjects\UserApiKeyVOMother;
use Tests\User\Domain\User\ValueObjects\UserEmailVerifiedAtVOMother;
use Tests\User\Domain\User\ValueObjects\UserRememberTokenVOMother;
use Tests\User\Domain\User\ValueObjects\UserLastLoginVOMother;
use Tests\User\Domain\User\ValueObjects\UserActiveVOMother;
use Tests\User\Domain\User\ValueObjects\UserVerifiedVOMother;
use Tests\User\Domain\User\ValueObjects\UserCreatedAtVOMother;
use Tests\User\Domain\User\ValueObjects\UserUpdatedAtVOMother;


final class UserMother
{
    public static function create(
		UserIdVO $id,
		UserUuidVO $uuid,
		UserRoleIdVO $role_id,
		UserNameVO $name,
		UserFirstSurnameVO $first_surname,
		UserSecondSurnameVO $second_surname,
		UserEmailVO $email,
		UserAgeVO $age,
		UserGenderVO $gender,
		UserPasswordVO $password,
		UserLangVO $lang,
		UserApiKeyVO $api_key,
		UserEmailVerifiedAtVO $email_verified_at,
		UserRememberTokenVO $remember_token,
		UserLastLoginVO $last_login,
		UserActiveVO $active,
		UserVerifiedVO $verified,
		UserCreatedAtVO $created_at,
		UserUpdatedAtVO $updated_at,

    ): User
    {
        return new User(
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
    }

    public static function random(): User
    {
        return self::create(
			UserIdVOMother::random(),
			UserUuidVOMother::random(),
			UserRoleIdVOMother::random(),
			UserNameVOMother::random(),
			UserFirstSurnameVOMother::random(),
			UserSecondSurnameVOMother::random(),
			UserEmailVOMother::random(),
			UserAgeVOMother::random(),
			UserGenderVOMother::random(),
			UserPasswordVOMother::random(),
			UserLangVOMother::random(),
			UserApiKeyVOMother::random(),
			UserEmailVerifiedAtVOMother::random(),
			UserRememberTokenVOMother::random(),
			UserLastLoginVOMother::random(),
			UserActiveVOMother::random(),
			UserVerifiedVOMother::random(),
			UserCreatedAtVOMother::random(),
			UserUpdatedAtVOMother::random(),

        );
    }
}
