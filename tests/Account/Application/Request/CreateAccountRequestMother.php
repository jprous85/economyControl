<?php

namespace Tests\Account\Application\Request;

use Src\Account\Application\Request\CreateAccountRequest;
use Tests\Account\Domain\Account\ValueObjects\AccountDescriptionVOMother;
use Tests\Account\Domain\Account\ValueObjects\AccountNameVOMother;
use Tests\Account\Domain\Account\ValueObjects\AccountOwnersAccountVOMother;
use Tests\Account\Domain\Account\ValueObjects\AccountUsersVOMother;


final class CreateAccountRequestMother
{
    public static function create(
        string $name,
        string $description,
        string $users,
        string $ownersAccount
    ): CreateAccountRequest
    {
        return new CreateAccountRequest(
            $name,
            $description,
            $users,
            $ownersAccount
        );
    }

    public static function random(): CreateAccountRequest
    {
        $name          = AccountNameVOMother::random()->value();
        $description   = AccountDescriptionVOMother::random()->value();
        $users         = AccountUsersVOMother::random()->value();
        $ownersAccount = AccountOwnersAccountVOMother::random()->value();

        return self::create(
            $name,
            $description,
            $users,
            $ownersAccount
        );
    }

}
