<?php

declare(strict_types=1);

namespace Tests\Economy\Domain\Economy\ValueObjects;

use Src\Economy\Domain\Economy\ValueObjects\EconomyEconomicManagementVO;
use Faker\Factory;


final class EconomyEconomicManagementVOMother
{
    public static function create(json  $value): EconomyEconomicManagementVO
    {
        return new EconomyEconomicManagementVO($value);
    }

    public static function random(): EconomyEconomicManagementVO
    {
        $faker = Factory::create();
        return self::create();
    }
}
