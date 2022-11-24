<?php

namespace Tests\Account\Application\Request;

use Src\Account\Application\Request\UpdateAccountRequest;
use Tests\Account\Domain\Account\ValueObjects\AccountIdVOMother;
use Tests\Account\Domain\Account\ValueObjects\AccountNameVOMother;
use Tests\Account\Domain\Account\ValueObjects\AccountUsersVOMother;
use Tests\Account\Domain\Account\ValueObjects\AccountActiveVOMother;
use Tests\Account\Domain\Account\ValueObjects\AccountCreatedAtVOMother;
use Tests\Account\Domain\Account\ValueObjects\AccountUpdatedAtVOMother;


final class UpdateAccountRequestMother
{
    public static function create(
		string $name,
		string $users,
		int $active

    ): UpdateAccountRequest
    {
        return new UpdateAccountRequest(
				$name,
				$users,
				$active
        );
    }

    public static function random(): UpdateAccountRequest
    {
		$name = AccountNameVOMother::random()->value();
		$users = AccountUsersVOMother::random()->value();
		$active = AccountActiveVOMother::random()->value();

        return self::create(
				$name,
				$users,
				$active
        );
    }

}
