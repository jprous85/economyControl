<?php

namespace Tests\Economy\Application\Request;

use Src\Economy\Application\Request\UpdateEconomyRequest;
use Tests\Economy\Domain\Economy\ValueObjects\EconomyStartMonthVOMother;
use Tests\Economy\Domain\Economy\ValueObjects\EconomyEndMonthVOMother;
use Tests\Economy\Domain\Economy\ValueObjects\EconomyAccountUuidVOMother;
use Tests\Economy\Domain\Economy\ValueObjects\EconomyEconomicManagementVOMother;
use Tests\Economy\Domain\Economy\ValueObjects\EconomyActiveVOMother;


final class UpdateEconomyRequestMother
{
    public static function create(
		string $start_month,
		string $end_month,
		string $account_uuid,
		string $economic_management,
		int $active
    ): UpdateEconomyRequest
    {
        return new UpdateEconomyRequest(
				$start_month,
				$end_month,
				$account_uuid,
				$economic_management,
				$active
        );
    }

    public static function random(): UpdateEconomyRequest
    {
		$start_month = EconomyStartMonthVOMother::random()->value();
		$end_month = EconomyEndMonthVOMother::random()->value();
		$account_id = EconomyAccountUuidVOMother::random()->value();
		$economic_management = EconomyEconomicManagementVOMother::random()->value();
		$active = EconomyActiveVOMother::random()->value();

        return self::create(
				$start_month,
				$end_month,
				$account_id,
				$economic_management,
				$active
        );
    }

}
