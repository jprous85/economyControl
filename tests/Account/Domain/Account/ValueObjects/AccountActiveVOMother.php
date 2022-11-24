<?php

declare(strict_types=1);

namespace Tests\Account\Domain\Account\ValueObjects;

use Src\Account\Domain\Account\ValueObjects\AccountActiveVO;
use Faker\Factory;


final class AccountActiveVOMother
{
    public static function create(int  $value): AccountActiveVO
    {
        return new AccountActiveVO($value);
    }

    public static function random(): AccountActiveVO
    {
        $faker = Factory::create();
        return self::create((int)$faker->boolean);
    }
}
