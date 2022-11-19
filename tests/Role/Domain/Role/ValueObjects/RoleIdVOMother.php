<?php

declare(strict_types=1);

namespace Tests\Role\Domain\Role\ValueObjects;

use Src\Role\Domain\Role\ValueObjects\RoleIdVO;
use Faker\Factory;


final class RoleIdVOMother
{
    public static function create(int  $value): RoleIdVO
    {
        return new RoleIdVO($value);
    }

    public static function random(): RoleIdVO
    {
        $faker = Factory::create();
        return self::create();
    }
}
