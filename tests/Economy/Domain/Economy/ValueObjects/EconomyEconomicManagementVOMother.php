<?php

declare(strict_types=1);

namespace Tests\Economy\Domain\Economy\ValueObjects;

use Src\Economy\Domain\Economy\ValueObjects\EconomyEconomicManagementVO;


final class EconomyEconomicManagementVOMother
{
    public static function create(string $value): EconomyEconomicManagementVO
    {
        return new EconomyEconomicManagementVO($value);
    }

    public static function random(): EconomyEconomicManagementVO
    {
        return self::create('[{}]');
    }
}
