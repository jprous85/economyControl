<?php

namespace Src\Economy\Application\Request;

class UpdateEconomyRequest
{
    public function __construct(
		private int $id,
		private string $start_month,
		private string $end_month,
		private int $account_id,
		private json $economic_management,
		private int $active,
		private ?string $created_at,
		private ?string $updated_at
    )
    {
    }

	public function getId(): int {
		return $this->id;
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

	public function getEconomicManagement(): json {
		return $this->economic_management;
	}

	public function getActive(): int {
		return $this->active;
	}

	public function getCreatedAt(): ?string {
		return $this->created_at;
	}

	public function getUpdatedAt(): ?string {
		return $this->updated_at;
	}


}
