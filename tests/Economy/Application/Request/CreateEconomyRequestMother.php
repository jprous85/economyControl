<?php

namespace Tests\Economy\Application\Request;

use Src\Economy\Application\Request\CreateEconomyRequest;
use Tests\Economy\Domain\Economy\ValueObjects\EconomyStartMonthVOMother;
use Tests\Economy\Domain\Economy\ValueObjects\EconomyEndMonthVOMother;
use Tests\Economy\Domain\Economy\ValueObjects\EconomyAccountIdVOMother;
use Tests\Economy\Domain\Economy\ValueObjects\EconomyEconomicManagementVOMother;

final class CreateEconomyRequestMother
{
    public static function create(
		string $start_month,
		string $end_month,
		int $account_id,
		string $economic_management

    ): CreateEconomyRequest
    {
        return new CreateEconomyRequest(
				$start_month,
				$end_month,
				$account_id,
				$economic_management
        );
    }

    public static function random(): CreateEconomyRequest
    {
		$start_month = EconomyStartMonthVOMother::random()->value();
		$end_month = EconomyEndMonthVOMother::random()->value();
		$account_id = EconomyAccountIdVOMother::random()->value();
		$economic_management = EconomyEconomicManagementVOMother::random()->value();

        return self::create(
				$start_month,
				$end_month,
				$account_id,
				$economic_management

        );
    }

}
