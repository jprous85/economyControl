<?php

declare(strict_types=1);

namespace Tests\Account\Domain\Account\ValueObjects;

use Faker\Factory;
use Src\Account\Domain\Account\ValueObjects\AccountUuidVO;


final class AccountUuidVOMother
{
    public static function create(string  $value): AccountUuidVO
    {
        return new AccountUuidVO($value);
    }

    public static function random(): AccountUuidVO
    {
        $faker = Factory::create();
        return self::create($faker->uuid());
    }
}
