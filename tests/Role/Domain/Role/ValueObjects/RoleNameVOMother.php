<?php

declare(strict_types=1);

namespace Tests\Role\Domain\Role\ValueObjects;

use Src\Role\Domain\Role\ValueObjects\RoleNameVO;
use Faker\Factory;


final class RoleNameVOMother
{
    public static function create(string  $value): RoleNameVO
    {
        return new RoleNameVO($value);
    }

    public static function random(): RoleNameVO
    {
        $faker = Factory::create();
        return self::create();
    }
}
