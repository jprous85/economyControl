<?php

declare(strict_types=1);

namespace Tests\Economy\Domain\Economy\ValueObjects;

use Src\Economy\Domain\Economy\ValueObjects\EconomyEndMonthVO;
use Faker\Factory;


final class EconomyEndMonthVOMother
{
    public static function create(string  $value): EconomyEndMonthVO
    {
        return new EconomyEndMonthVO($value);
    }

    public static function random(): EconomyEndMonthVO
    {
        $faker = Factory::create();
        return self::create();
    }
}
