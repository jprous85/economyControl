<?php

declare(strict_types=1);

namespace Tests\User\Domain\User\ValueObjects;

use Src\User\Domain\User\ValueObjects\UserLastLoginVO;
use Faker\Factory;


final class UserLastLoginVOMother
{
    public static function create(string  $value): UserLastLoginVO
    {
        return new UserLastLoginVO($value);
    }

    public static function random(): UserLastLoginVO
    {
        $faker = Factory::create();
        return self::create($faker->date);
    }
}
