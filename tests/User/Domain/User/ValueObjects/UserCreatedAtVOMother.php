<?php

declare(strict_types=1);

namespace Tests\User\Domain\User\ValueObjects;

use Src\User\Domain\User\ValueObjects\UserCreatedAtVO;
use Faker\Factory;


final class UserCreatedAtVOMother
{
    public static function create(string  $value): UserCreatedAtVO
    {
        return new UserCreatedAtVO($value);
    }

    public static function random(): UserCreatedAtVO
    {
        $faker = Factory::create();
        return self::create();
    }
}
