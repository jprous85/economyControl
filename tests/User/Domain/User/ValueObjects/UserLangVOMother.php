<?php

declare(strict_types=1);

namespace Tests\User\Domain\User\ValueObjects;

use Src\User\Domain\User\ValueObjects\UserLangVO;
use Faker\Factory;


final class UserLangVOMother
{
    public static function create(string  $value): UserLangVO
    {
        return new UserLangVO($value);
    }

    public static function random(): UserLangVO
    {
        $faker = Factory::create();
        return self::create();
    }
}
