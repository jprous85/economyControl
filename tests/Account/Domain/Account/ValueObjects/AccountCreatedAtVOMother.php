<?php

declare(strict_types=1);

namespace Tests\Account\Domain\Account\ValueObjects;

use Src\Account\Domain\Account\ValueObjects\AccountCreatedAtVO;
use Faker\Factory;


final class AccountCreatedAtVOMother
{
    public static function create(string  $value): AccountCreatedAtVO
    {
        return new AccountCreatedAtVO($value);
    }

    public static function random(): AccountCreatedAtVO
    {
        $faker = Factory::create();
        return self::create($faker->date);
    }
}
