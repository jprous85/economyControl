<?php

namespace Src\Economy\Application\Request;

class CreateEconomyRequest
{
    public function __construct(
		private string $start_month,
		private string $end_month,
		private int $account_id,
		private string $economic_management,
    )
    {
    }

	public function getStartMonth(): string {
		return $this->start_month;
	}

	public function getEndMonth(): string {
		return $this->end_month;
	}

	public function getAccountId(): int {
		return $this->account_id;
	}

	public function getEconomicManagement(): string {
		return $this->economic_management;
	}

}
