<?php

declare(strict_types=1);

namespace Tests\Account\Domain\Account\ValueObjects;

use Src\Account\Domain\Account\ValueObjects\AccountNameVO;
use Faker\Factory;


final class AccountNameVOMother
{
    public static function create(string  $value): AccountNameVO
    {
        return new AccountNameVO($value);
    }

    public static function random(): AccountNameVO
    {
        $faker = Factory::create();
        return self::create($faker->name);
    }
}
