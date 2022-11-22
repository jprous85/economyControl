<?php

declare(strict_types=1);

namespace Tests\User\Domain\User\ValueObjects;

use Src\User\Domain\User\ValueObjects\UserEmailVO;
use Faker\Factory;


final class UserEmailVOMother
{
    public static function create(string  $value): UserEmailVO
    {
        return new UserEmailVO($value);
    }

    public static function random(): UserEmailVO
    {
        $faker = Factory::create();
        return self::create($faker->email);
    }
}
