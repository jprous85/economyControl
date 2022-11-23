<?php

declare(strict_types=1);

namespace Tests\Economy\Domain\Economy\ValueObjects;

use Src\Economy\Domain\Economy\ValueObjects\EconomyUpdatedAtVO;
use Faker\Factory;


final class EconomyUpdatedAtVOMother
{
    public static function create(string  $value): EconomyUpdatedAtVO
    {
        return new EconomyUpdatedAtVO($value);
    }

    public static function random(): EconomyUpdatedAtVO
    {
        $faker = Factory::create();
        return self::create();
    }
}
