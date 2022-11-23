<?php

declare(strict_types=1);

namespace Tests\Account\Domain\Account\ValueObjects;

use Src\Account\Domain\Account\ValueObjects\AccountUsersVO;
use Faker\Factory;


final class AccountUsersVOMother
{
    public static function create(json  $value): AccountUsersVO
    {
        return new AccountUsersVO($value);
    }

    public static function random(): AccountUsersVO
    {
        $faker = Factory::create();
        return self::create();
    }
}
