<?php

declare(strict_types=1);

namespace Tests\User\Domain\User\ValueObjects;

use Src\User\Domain\User\ValueObjects\UserFirstSurnameVO;
use Faker\Factory;


final class UserFirstSurnameVOMother
{
    public static function create(string  $value): UserFirstSurnameVO
    {
        return new UserFirstSurnameVO($value);
    }

    public static function random(): UserFirstSurnameVO
    {
        $faker = Factory::create();
        return self::create();
    }
}
