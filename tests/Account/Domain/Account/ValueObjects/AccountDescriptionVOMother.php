<?php

declare(strict_types=1);

namespace Tests\Account\Domain\Account\ValueObjects;

use Src\Account\Domain\Account\ValueObjects\AccountDescriptionVO;
use Faker\Factory;


final class AccountDescriptionVOMother
{
    public static function create(string  $value): AccountDescriptionVO
    {
        return new AccountDescriptionVO($value);
    }

    public static function random(): AccountDescriptionVO
    {
        $faker = Factory::create();
        return self::create($faker->text);
    }
}
