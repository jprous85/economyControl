<?php

declare(strict_types=1);

namespace Tests\Role\Domain\Role\ValueObjects;

use Src\Role\Domain\Role\ValueObjects\RoleActiveVO;
use Faker\Factory;


final class RoleActiveVOMother
{
    public static function create(int  $value): RoleActiveVO
    {
        return new RoleActiveVO($value);
    }

    public static function random(): RoleActiveVO
    {
        $faker = Factory::create();
        return self::create();
    }
}
