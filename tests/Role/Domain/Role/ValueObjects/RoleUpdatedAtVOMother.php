<?php

declare(strict_types=1);

namespace Tests\Role\Domain\Role\ValueObjects;

use Src\Role\Domain\Role\ValueObjects\RoleUpdatedAtVO;
use Faker\Factory;


final class RoleUpdatedAtVOMother
{
    public static function create(string  $value): RoleUpdatedAtVO
    {
        return new RoleUpdatedAtVO($value);
    }

    public static function random(): RoleUpdatedAtVO
    {
        $faker = Factory::create();
        return self::create();
    }
}
