<?php

declare(strict_types=1);

namespace Tests\Economy\Domain\Economy\ValueObjects;

use Src\Economy\Domain\Economy\ValueObjects\EconomyAccountUuidVO;
use Faker\Factory;


final class EconomyAccountUuidVOMother
{
    public static function create(string  $value): EconomyAccountUuidVO
    {
        return new EconomyAccountUuidVO($value);
    }

    public static function random(): EconomyAccountUuidVO
    {
        $faker = Factory::create();
        return self::create($faker->uuid());
    }
}
