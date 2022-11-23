<?php

namespace Tests\Economy\Application\Request;

use Src\Economy\Application\Request\UpdateEconomyRequest;
use Tests\Economy\Domain\Economy\ValueObjects\EconomyIdVOMother;
use Tests\Economy\Domain\Economy\ValueObjects\EconomyStartMonthVOMother;
use Tests\Economy\Domain\Economy\ValueObjects\EconomyEndMonthVOMother;
use Tests\Economy\Domain\Economy\ValueObjects\EconomyAccountIdVOMother;
use Tests\Economy\Domain\Economy\ValueObjects\EconomyEconomicManagementVOMother;
use Tests\Economy\Domain\Economy\ValueObjects\EconomyActiveVOMother;
use Tests\Economy\Domain\Economy\ValueObjects\EconomyCreatedAtVOMother;
use Tests\Economy\Domain\Economy\ValueObjects\EconomyUpdatedAtVOMother;


final class UpdateEconomyRequestMother
{
    public static function create(
		int $id,
		string $start_month,
		string $end_month,
		int $account_id,
		json $economic_management,
		int $active,
		?string $created_at,
		?string $updated_at,

    ): UpdateEconomyRequest
    {
        return new UpdateEconomyRequest(
				$id,
				$start_month,
				$end_month,
				$account_id,
				$economic_management,
				$active,
				$created_at,
				$updated_at,

        );
    }

    public static function random(): UpdateEconomyRequest
    {
		$id = EconomyIdVOMother::random()->value();
		$start_month = EconomyStartMonthVOMother::random()->value();
		$end_month = EconomyEndMonthVOMother::random()->value();
		$account_id = EconomyAccountIdVOMother::random()->value();
		$economic_management = EconomyEconomicManagementVOMother::random()->value();
		$active = EconomyActiveVOMother::random()->value();
		$created_at = EconomyCreatedAtVOMother::random()->value();
		$updated_at = EconomyUpdatedAtVOMother::random()->value();

        return self::create(
				$id,
				$start_month,
				$end_month,
				$account_id,
				$economic_management,
				$active,
				$created_at,
				$updated_at,

        );
    }

}