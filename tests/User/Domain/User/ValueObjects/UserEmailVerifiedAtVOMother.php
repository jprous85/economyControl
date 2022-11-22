<?php

declare(strict_types=1);

namespace Tests\User\Domain\User\ValueObjects;

use Src\User\Domain\User\ValueObjects\UserEmailVerifiedAtVO;
use Faker\Factory;


final class UserEmailVerifiedAtVOMother
{
    public static function create(string  $value): UserEmailVerifiedAtVO
    {
        return new UserEmailVerifiedAtVO($value);
    }

    public static function random(): UserEmailVerifiedAtVO
    {
        $faker = Factory::create();
        return self::create($faker->date);
    }
}
