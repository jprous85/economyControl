<?php

declare(strict_types=1);

namespace Tests\User\Domain\User\ValueObjects;

use Src\User\Domain\User\ValueObjects\UserSecondSurnameVO;
use Faker\Factory;


final class UserSecondSurnameVOMother
{
    public static function create(string  $value): UserSecondSurnameVO
    {
        return new UserSecondSurnameVO($value);
    }

    public static function random(): UserSecondSurnameVO
    {
        $faker = Factory::create();
        return self::create($faker->lastName);
    }
}
