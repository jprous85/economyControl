<?php

namespace Tests\Economy\Domain\Economy;

use Src\Economy\Domain\Economy\Economy;

use Src\Economy\Domain\Economy\ValueObjects\EconomyIdVO;
use Src\Economy\Domain\Economy\ValueObjects\EconomyStartMonthVO;
use Src\Economy\Domain\Economy\ValueObjects\EconomyEndMonthVO;
use Src\Economy\Domain\Economy\ValueObjects\EconomyAccountIdVO;
use Src\Economy\Domain\Economy\ValueObjects\EconomyEconomicManagementVO;
use Src\Economy\Domain\Economy\ValueObjects\EconomyActiveVO;
use Src\Economy\Domain\Economy\ValueObjects\EconomyCreatedAtVO;
use Src\Economy\Domain\Economy\ValueObjects\EconomyUpdatedAtVO;

use Tests\Economy\Domain\Economy\ValueObjects\EconomyIdVOMother;
use Tests\Economy\Domain\Economy\ValueObjects\EconomyStartMonthVOMother;
use Tests\Economy\Domain\Economy\ValueObjects\EconomyEndMonthVOMother;
use Tests\Economy\Domain\Economy\ValueObjects\EconomyAccountIdVOMother;
use Tests\Economy\Domain\Economy\ValueObjects\EconomyEconomicManagementVOMother;
use Tests\Economy\Domain\Economy\ValueObjects\EconomyActiveVOMother;
use Tests\Economy\Domain\Economy\ValueObjects\EconomyCreatedAtVOMother;
use Tests\Economy\Domain\Economy\ValueObjects\EconomyUpdatedAtVOMother;


final class EconomyMother
{
    public static function create(
		EconomyIdVO $id,
		EconomyStartMonthVO $start_month,
		EconomyEndMonthVO $end_month,
		EconomyAccountIdVO $account_id,
		EconomyEconomicManagementVO $economic_management,
		EconomyActiveVO $active,
		EconomyCreatedAtVO $created_at,
		EconomyUpdatedAtVO $updated_at,

    ): Economy
    {
        return new Economy(
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

    public static function random(): Economy
    {
        return self::create(
			EconomyIdVOMother::random(),
			EconomyStartMonthVOMother::random(),
			EconomyEndMonthVOMother::random(),
			EconomyAccountIdVOMother::random(),
			EconomyEconomicManagementVOMother::random(),
			EconomyActiveVOMother::random(),
			EconomyCreatedAtVOMother::random(),
			EconomyUpdatedAtVOMother::random(),

        );
    }
}
