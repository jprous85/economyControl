<?php

declare(strict_types=1);

namespace Tests\Account\Domain\Account\ValueObjects;

use Src\Account\Domain\Account\ValueObjects\AccountIdVO;
use Faker\Factory;


final class AccountIdVOMother
{
    public static function create(int  $value): AccountIdVO
    {
        return new AccountIdVO($value);
    }

    public static function random(): AccountIdVO
    {
        $faker = Factory::create();
        return self::create($faker->randomDigitNotZero());
    }
}
