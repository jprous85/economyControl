<?php

declare(strict_types=1);

namespace Tests\Economy\Domain\Economy\ValueObjects;

use Src\Economy\Domain\Economy\ValueObjects\EconomyIdVO;
use Faker\Factory;


final class EconomyIdVOMother
{
    public static function create(int  $value): EconomyIdVO
    {
        return new EconomyIdVO($value);
    }

    public static function random(): EconomyIdVO
    {
        $faker = Factory::create();
        return self::create();
    }
}
