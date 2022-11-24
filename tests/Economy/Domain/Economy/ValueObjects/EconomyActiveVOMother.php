<?php

declare(strict_types=1);

namespace Tests\Economy\Domain\Economy\ValueObjects;

use Src\Economy\Domain\Economy\ValueObjects\EconomyActiveVO;
use Faker\Factory;


final class EconomyActiveVOMother
{
    public static function create(int  $value): EconomyActiveVO
    {
        return new EconomyActiveVO($value);
    }

    public static function random(): EconomyActiveVO
    {
        $faker = Factory::create();
        return self::create((int)$faker->boolean);
    }
}
