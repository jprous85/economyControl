<?php

declare(strict_types=1);

namespace Tests\User\Domain\User\ValueObjects;

use Src\User\Domain\User\ValueObjects\UserAgeVO;
use Faker\Factory;


final class UserAgeVOMother
{
    public static function create(int  $value): UserAgeVO
    {
        return new UserAgeVO($value);
    }

    public static function random(): UserAgeVO
    {
        $faker = Factory::create();
        return self::create();
    }
}
