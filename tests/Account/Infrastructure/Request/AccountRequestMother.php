<?php

namespace Tests\Account\Infrastructure\Request;

use Tests\Account\Domain\Account\ValueObjects\AccountIdVOMother;
use Tests\Account\Domain\Account\ValueObjects\AccountNameVOMother;
use Tests\Account\Domain\Account\ValueObjects\AccountUsersVOMother;
use Tests\Account\Domain\Account\ValueObjects\AccountActiveVOMother;
use Tests\Account\Domain\Account\ValueObjects\AccountCreatedAtVOMother;
use Tests\Account\Domain\Account\ValueObjects\AccountUpdatedAtVOMother;


final class AccountRequestMother
{
    public static function random(): array
    {
        return [
			'id' => AccountIdVOMother::random()->value(),
			'name' => AccountNameVOMother::random()->value(),
			'users' => AccountUsersVOMother::random()->value(),
			'active' => AccountActiveVOMother::random()->value(),
			'created_at' => AccountCreatedAtVOMother::random()->value(),
			'updated_at' => AccountUpdatedAtVOMother::random()->value(),

        ];
    }
}
