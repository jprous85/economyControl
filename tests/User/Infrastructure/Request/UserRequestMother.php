<?php

namespace Tests\User\Infrastructure\Request;

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


final class UserRequestMother
{
    public static function random(): array
    {
        return [
			'id' => UserIdVOMother::random()->value(),
			'uuid' => UserUuidVOMother::random()->value(),
			'role_id' => UserRoleIdVOMother::random()->value(),
			'name' => UserNameVOMother::random()->value(),
			'first_surname' => UserFirstSurnameVOMother::random()->value(),
			'second_surname' => UserSecondSurnameVOMother::random()->value(),
			'email' => UserEmailVOMother::random()->value(),
			'age' => UserAgeVOMother::random()->value(),
			'gender' => UserGenderVOMother::random()->value(),
			'password' => UserPasswordVOMother::random()->value(),
			'lang' => UserLangVOMother::random()->value(),
			'api_key' => UserApiKeyVOMother::random()->value(),
			'email_verified_at' => UserEmailVerifiedAtVOMother::random()->value(),
			'remember_token' => UserRememberTokenVOMother::random()->value(),
			'last_login' => UserLastLoginVOMother::random()->value(),
			'active' => UserActiveVOMother::random()->value(),
			'verified' => UserVerifiedVOMother::random()->value(),
			'created_at' => UserCreatedAtVOMother::random()->value(),
			'updated_at' => UserUpdatedAtVOMother::random()->value(),

        ];
    }
}
