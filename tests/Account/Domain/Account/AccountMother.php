<?php

namespace Tests\Account\Domain\Account;

use Src\Account\Domain\Account\Account;

use Src\Account\Domain\Account\ValueObjects\AccountDescriptionVO;
use Src\Account\Domain\Account\ValueObjects\AccountIdVO;
use Src\Account\Domain\Account\ValueObjects\AccountNameVO;
use Src\Account\Domain\Account\ValueObjects\AccountOwnersAccountVO;
use Src\Account\Domain\Account\ValueObjects\AccountUsersVO;
use Src\Account\Domain\Account\ValueObjects\AccountActiveVO;
use Src\Account\Domain\Account\ValueObjects\AccountCreatedAtVO;
use Src\Account\Domain\Account\ValueObjects\AccountUpdatedAtVO;

use Src\Account\Domain\Account\ValueObjects\AccountUuidVO;
use Tests\Account\Domain\Account\ValueObjects\AccountDescriptionVOMother;
use Tests\Account\Domain\Account\ValueObjects\AccountIdVOMother;
use Tests\Account\Domain\Account\ValueObjects\AccountNameVOMother;
use Tests\Account\Domain\Account\ValueObjects\AccountOwnersAccountVOMother;
use Tests\Account\Domain\Account\ValueObjects\AccountUsersVOMother;
use Tests\Account\Domain\Account\ValueObjects\AccountActiveVOMother;
use Tests\Account\Domain\Account\ValueObjects\AccountCreatedAtVOMother;
use Tests\Account\Domain\Account\ValueObjects\AccountUpdatedAtVOMother;
use Tests\Account\Domain\Account\ValueObjects\AccountUuidVOMother;


final class AccountMother
{
    public static function create(
        AccountIdVO            $id,
        AccountUuidVO          $uuid,
        AccountNameVO          $name,
        AccountDescriptionVO   $description,
        AccountUsersVO         $users,
        AccountOwnersAccountVO $ownersAccount,
        AccountActiveVO        $active,
        AccountCreatedAtVO     $created_at,
        AccountUpdatedAtVO     $updated_at,

    ): Account
    {
        return new Account(
            $id,
            $uuid,
            $name,
            $description,
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
            AccountUuidVOMother::random(),
            AccountNameVOMother::random(),
            AccountDescriptionVOMother::random(),
            AccountUsersVOMother::random(),
            AccountOwnersAccountVOMother::random(),
            AccountActiveVOMother::random(),
            AccountCreatedAtVOMother::random(),
            AccountUpdatedAtVOMother::random(),

        );
    }
}
