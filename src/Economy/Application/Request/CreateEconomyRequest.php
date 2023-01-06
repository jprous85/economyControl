<?php

namespace Src\Economy\Application\Request;

class CreateEconomyRequest
{
    public function __construct(
		private string $start_month,
		private string $end_month,
		private string $account_uuid
    )
    {
    }

	public function getStartMonth(): string {
		return $this->start_month;
	}

	public function getEndMonth(): string {
		return $this->end_month;
	}

	public function getAccountUuid(): string {
		return $this->account_uuid;
	}
}
