<?php

declare(strict_types=1);

namespace Tests\User\Domain\User\ValueObjects;

use Src\User\Domain\User\ValueObjects\UserRoleIdVO;
use Faker\Factory;


final class UserRoleIdVOMother
{
    public static function create(int  $value): UserRoleIdVO
    {
        return new UserRoleIdVO($value);
    }

    public static function random(): UserRoleIdVO
    {
        return self::create(1);
    }
}
