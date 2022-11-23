<?php

namespace Tests\Economy\Infrastructure\Request;

use Tests\Economy\Domain\Economy\ValueObjects\EconomyIdVOMother;
use Tests\Economy\Domain\Economy\ValueObjects\EconomyStartMonthVOMother;
use Tests\Economy\Domain\Economy\ValueObjects\EconomyEndMonthVOMother;
use Tests\Economy\Domain\Economy\ValueObjects\EconomyAccountIdVOMother;
use Tests\Economy\Domain\Economy\ValueObjects\EconomyEconomicManagementVOMother;
use Tests\Economy\Domain\Economy\ValueObjects\EconomyActiveVOMother;
use Tests\Economy\Domain\Economy\ValueObjects\EconomyCreatedAtVOMother;
use Tests\Economy\Domain\Economy\ValueObjects\EconomyUpdatedAtVOMother;


final class EconomyRequestMother
{
    public static function random(): array
    {
        return [
			'id' => EconomyIdVOMother::random()->value(),
			'start_month' => EconomyStartMonthVOMother::random()->value(),
			'end_month' => EconomyEndMonthVOMother::random()->value(),
			'account_id' => EconomyAccountIdVOMother::random()->value(),
			'economic_management' => EconomyEconomicManagementVOMother::random()->value(),
			'active' => EconomyActiveVOMother::random()->value(),
			'created_at' => EconomyCreatedAtVOMother::random()->value(),
			'updated_at' => EconomyUpdatedAtVOMother::random()->value(),

        ];
    }
}
