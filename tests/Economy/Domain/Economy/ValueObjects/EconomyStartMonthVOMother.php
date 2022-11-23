<?php

declare(strict_types=1);

namespace Tests\Economy\Domain\Economy\ValueObjects;

use Src\Economy\Domain\Economy\ValueObjects\EconomyStartMonthVO;
use Faker\Factory;


final class EconomyStartMonthVOMother
{
    public static function create(string  $value): EconomyStartMonthVO
    {
        return new EconomyStartMonthVO($value);
    }

    public static function random(): EconomyStartMonthVO
    {
        $faker = Factory::create();
        return self::create();
    }
}
