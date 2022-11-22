<?php

declare(strict_types=1);

namespace Tests\Role\Domain\Role\ValueObjects;

use Src\Role\Domain\Role\ValueObjects\RoleCreatedAtVO;
use Faker\Factory;


final class RoleCreatedAtVOMother
{
    public static function create(string  $value): RoleCreatedAtVO
    {
        return new RoleCreatedAtVO($value);
    }

    public static function random(): RoleCreatedAtVO
    {
        $faker = Factory::create();
        return self::create($faker->date);
    }
}
