<?php

declare(strict_types=1);

namespace Tests\User\Domain\User\ValueObjects;

use Src\User\Domain\User\ValueObjects\UserGenderVO;
use Faker\Factory;


final class UserGenderVOMother
{
    public static function create(string  $value): UserGenderVO
    {
        return new UserGenderVO($value);
    }

    public static function random(): UserGenderVO
    {
        $faker = Factory::create();
        return self::create(($faker->boolean) ? 'M' : 'W');
    }
}
