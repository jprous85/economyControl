<?php

declare(strict_types=1);

namespace Tests\User\Domain\User\ValueObjects;

use Src\User\Domain\User\ValueObjects\UserNameVO;
use Faker\Factory;


final class UserNameVOMother
{
    public static function create(string  $value): UserNameVO
    {
        return new UserNameVO($value);
    }

    public static function random(): UserNameVO
    {
        $faker = Factory::create();
        return self::create($faker->name);
    }
}
