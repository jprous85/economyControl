<?php

declare(strict_types=1);

namespace Tests\User\Domain\User\ValueObjects;

use Src\User\Domain\User\ValueObjects\UserUpdatedAtVO;
use Faker\Factory;


final class UserUpdatedAtVOMother
{
    public static function create(string  $value): UserUpdatedAtVO
    {
        return new UserUpdatedAtVO($value);
    }

    public static function random(): UserUpdatedAtVO
    {
        $faker = Factory::create();
        return self::create($faker->date);
    }
}
