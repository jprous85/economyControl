<?php

namespace Tests\Account\Application\Request;

use Src\Account\Application\Request\CreateAccountRequest;
use Tests\Account\Domain\Account\ValueObjects\AccountIdVOMother;
use Tests\Account\Domain\Account\ValueObjects\AccountNameVOMother;
use Tests\Account\Domain\Account\ValueObjects\AccountUsersVOMother;
use Tests\Account\Domain\Account\ValueObjects\AccountActiveVOMother;
use Tests\Account\Domain\Account\ValueObjects\AccountCreatedAtVOMother;
use Tests\Account\Domain\Account\ValueObjects\AccountUpdatedAtVOMother;


use Faker\Factory;

final class CreateAccountRequestMother
{
    public static function create(
		int $id,
		string $name,
		json $users,
		int $active,
		?string $created_at,
		?string $updated_at,

    ): CreateAccountRequest
    {
        return new CreateAccountRequest(
				$id,
				$name,
				$users,
				$active,
				$created_at,
				$updated_at,

        );
    }

    public static function random(): CreateAccountRequest
    {
		$id = AccountIdVOMother::random()->value();
		$name = AccountNameVOMother::random()->value();
		$users = AccountUsersVOMother::random()->value();
		$active = AccountActiveVOMother::random()->value();
		$created_at = AccountCreatedAtVOMother::random()->value();
		$updated_at = AccountUpdatedAtVOMother::random()->value();

        return self::create(
				$id,
				$name,
				$users,
				$active,
				$created_at,
				$updated_at,

        );
    }

}
