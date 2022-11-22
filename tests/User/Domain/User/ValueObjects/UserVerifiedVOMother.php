<?php

declare(strict_types=1);

namespace Tests\User\Domain\User\ValueObjects;

use Src\User\Domain\User\ValueObjects\UserVerifiedVO;
use Faker\Factory;


final class UserVerifiedVOMother
{
    public static function create(int  $value): UserVerifiedVO
    {
        return new UserVerifiedVO($value);
    }

    public static function random(): UserVerifiedVO
    {
        $faker = Factory::create();
        return self::create((int) $faker->boolean);
    }
}
