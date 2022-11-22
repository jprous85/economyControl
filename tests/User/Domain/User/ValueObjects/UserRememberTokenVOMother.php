<?php

declare(strict_types=1);

namespace Tests\User\Domain\User\ValueObjects;

use Src\User\Domain\User\ValueObjects\UserRememberTokenVO;
use Faker\Factory;


final class UserRememberTokenVOMother
{
    public static function create(string  $value): UserRememberTokenVO
    {
        return new UserRememberTokenVO($value);
    }

    public static function random(): UserRememberTokenVO
    {
        $faker = Factory::create();
        return self::create('remembertoken');
    }
}
