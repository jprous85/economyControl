<?php

declare(strict_types=1);

namespace Tests\Economy\Domain\Economy\ValueObjects;

use Src\Economy\Domain\Economy\ValueObjects\EconomyCreatedAtVO;
use Faker\Factory;


final class EconomyCreatedAtVOMother
{
    public static function create(string  $value): EconomyCreatedAtVO
    {
        return new EconomyCreatedAtVO($value);
    }

    public static function random(): EconomyCreatedAtVO
    {
        $faker = Factory::create();
        return self::create();
    }
}
