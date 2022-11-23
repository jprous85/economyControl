<?php

declare(strict_types=1);

namespace Tests\Account\Domain\Account\ValueObjects;

use Src\Account\Domain\Account\ValueObjects\AccountUpdatedAtVO;
use Faker\Factory;


final class AccountUpdatedAtVOMother
{
    public static function create(string  $value): AccountUpdatedAtVO
    {
        return new AccountUpdatedAtVO($value);
    }

    public static function random(): AccountUpdatedAtVO
    {
        $faker = Factory::create();
        return self::create();
    }
}
