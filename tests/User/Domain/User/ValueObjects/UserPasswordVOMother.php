<?php

declare(strict_types=1);

namespace Tests\User\Domain\User\ValueObjects;

use Src\User\Domain\User\ValueObjects\UserPasswordVO;
use Faker\Factory;


final class UserPasswordVOMother
{
    public static function create(string  $value): UserPasswordVO
    {
        return new UserPasswordVO($value);
    }

    public static function random(): UserPasswordVO
    {
        $faker = Factory::create();
        return self::create($faker->password);
    }
}
