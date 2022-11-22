<?php

declare(strict_types=1);

namespace Tests\User\Domain\User\ValueObjects;

use Src\User\Domain\User\ValueObjects\UserUuidVO;
use Faker\Factory;


final class UserUuidVOMother
{
    public static function create(string  $value): UserUuidVO
    {
        return new UserUuidVO($value);
    }

    public static function random(): UserUuidVO
    {
        $faker = Factory::create();
        return self::create($faker->uuid);
    }
}
