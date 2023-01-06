<?php

namespace Tests\Economy\Application\Request;

use Src\Economy\Application\Request\CreateEconomyRequest;
use Tests\Economy\Domain\Economy\ValueObjects\EconomyStartMonthVOMother;
use Tests\Economy\Domain\Economy\ValueObjects\EconomyEndMonthVOMother;
use Tests\Economy\Domain\Economy\ValueObjects\EconomyAccountUuidVOMother;

final class CreateEconomyRequestMother
{
    public static function create(
		string $start_month,
		string $end_month,
		string $account_id,

    ): CreateEconomyRequest
    {
        return new CreateEconomyRequest(
				$start_month,
				$end_month,
				$account_id,
        );
    }

    public static function random(): CreateEconomyRequest
    {
		$start_month = EconomyStartMonthVOMother::random()->value();
		$end_month = EconomyEndMonthVOMother::random()->value();
		$account_id = EconomyAccountUuidVOMother::random()->value();

        return self::create(
				$start_month,
				$end_month,
				$account_id,
        );
    }

}
