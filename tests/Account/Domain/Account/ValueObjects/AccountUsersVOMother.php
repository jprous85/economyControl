<?php

declare(strict_types=1);

namespace Tests\Account\Domain\Account\ValueObjects;

use Src\Account\Domain\Account\ValueObjects\AccountUsersVO;


final class AccountUsersVOMother
{
    public static function create(string  $value): AccountUsersVO
    {
        return new AccountUsersVO($value);
    }

    public static function random(): AccountUsersVO
    {
        return self::create('[1,2,3,4]');
    }
}
