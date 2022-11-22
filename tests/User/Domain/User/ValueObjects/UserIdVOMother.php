<?php

declare(strict_types=1);

namespace Tests\User\Domain\User\ValueObjects;

use Src\User\Domain\User\ValueObjects\UserIdVO;
use Faker\Factory;


final class UserIdVOMother
{
    public static function create(int  $value): UserIdVO
    {
        return new UserIdVO($value);
    }

    public static function random(): UserIdVO
    {
        $faker = Factory::create();
        return self::create($faker->randomDigitNotZero());
    }
}
