<?php

declare(strict_types=1);

namespace Tests\Economy\Domain\Economy\ValueObjects;

use Src\Economy\Domain\Economy\ValueObjects\EconomyAccountIdVO;
use Faker\Factory;


final class EconomyAccountIdVOMother
{
    public static function create(int  $value): EconomyAccountIdVO
    {
        return new EconomyAccountIdVO($value);
    }

    public static function random(): EconomyAccountIdVO
    {
        $faker = Factory::create();
        return self::create();
    }
}
