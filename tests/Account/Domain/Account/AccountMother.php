<?php

namespace Tests\Account\Domain\Account;

use Src\Account\Domain\Account\Account;

use Src\Account\Domain\Account\ValueObjects\AccountIdVO;
use Src\Account\Domain\Account\ValueObjects\AccountNameVO;
use Src\Account\Domain\Account\ValueObjects\AccountOwnersAccountVO;
use Src\Account\Domain\Account\ValueObjects\AccountUsersVO;
use Src\Account\Domain\Account\ValueObjects\AccountActiveVO;
use Src\Account\Domain\Account\ValueObjects\AccountCreatedAtVO;
use Src\Account\Domain\Account\ValueObjects\AccountUpdatedAtVO;

use Tests\Account\Domain\Account\ValueObjects\AccountIdVOMother;
use Tests\Account\Domain\Account\ValueObjects\AccountNameVOMother;
use Tests\Account\Domain\Account\ValueObjects\AccountOwnersAccountVOMother;
use Tests\Account\Domain\Account\ValueObjects\AccountUsersVOMother;
use Tests\Account\Domain\Account\ValueObjects\AccountActiveVOMother;
use Tests\Account\Domain\Account\ValueObjects\AccountCreatedAtVOMother;
use Tests\Account\Domain\Account\ValueObjects\AccountUpdatedAtVOMother;


final class AccountMother
{
    public static function create(
        AccountIdVO            $id,
        AccountNameVO          $name,
        AccountUsersVO         $users,
        AccountOwnersAccountVO $ownersAccount,
        AccountActiveVO        $active,
        AccountCreatedAtVO     $created_at,
        AccountUpdatedAtVO     $updated_at,

    ): Account
    {
        return new Account(
            $id,
            $name,
            $users,
            $ownersAccount,
            $active,
            $created_at,
            $updated_at
        );
    }

    public static function random(): Account
    {
        return self::create(
            AccountIdVOMother::random(),
            AccountNameVOMother::random(),
            AccountUsersVOMother::random(),
            AccountOwnersAccountVOMother::random(),
            AccountActiveVOMother::random(),
            AccountCreatedAtVOMother::random(),
            AccountUpdatedAtVOMother::random(),

        );
    }
}
