<?php

namespace Src\Economy\Application\Request;

class UpdateEconomyRequest
{
    public function __construct(
		private string $start_month,
		private string $end_month,
		private string $account_uuid,
		private string $economic_management,
		private int $active
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

	public function getEconomicManagement(): string {
		return $this->economic_management;
	}

	public function getActive(): int {
		return $this->active;
	}

}
