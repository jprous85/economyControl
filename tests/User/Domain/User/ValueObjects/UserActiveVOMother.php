<?php

declare(strict_types=1);

namespace Tests\User\Domain\User\ValueObjects;

use Src\User\Domain\User\ValueObjects\UserActiveVO;
use Faker\Factory;


final class UserActiveVOMother
{
    public static function create(int  $value): UserActiveVO
    {
        return new UserActiveVO($value);
    }

    public static function random(): UserActiveVO
    {
        $faker = Factory::create();
        return self::create();
    }
}
