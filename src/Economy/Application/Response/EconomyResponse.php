<?php

declare(strict_types=1);

namespace Src\Economy\Application\Response;


use Src\Economy\Domain\Economy\Economy;

use Src\Economy\Domain\Economy\ValueObjects\EconomyIdVO;
use Src\Economy\Domain\Economy\ValueObjects\EconomyStartMonthVO;
use Src\Economy\Domain\Economy\ValueObjects\EconomyEndMonthVO;
use Src\Economy\Domain\Economy\ValueObjects\EconomyAccountIdVO;
use Src\Economy\Domain\Economy\ValueObjects\EconomyEconomicManagementVO;
use Src\Economy\Domain\Economy\ValueObjects\EconomyActiveVO;
use Src\Economy\Domain\Economy\ValueObjects\EconomyCreatedAtVO;
use Src\Economy\Domain\Economy\ValueObjects\EconomyUpdatedAtVO;


final class EconomyResponse
{
    public function __construct(
		private int $id,
		private string $start_month,
		private string $end_month,
		private int $account_id,
		private string $economic_management,
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

	public function getEconomicManagement(): string {
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



    public function toArray(): array
    {
        return [
			"id" => $this->id,
			"start_month" => $this->start_month,
			"end_month" => $this->end_month,
			"account_id" => $this->account_id,
			"economic_management" => $this->economic_management,
			"active" => $this->active,
			"created_at" => $this->created_at,
			"updated_at" => $this->updated_at,

        ];
    }

    public static function responseToEntity(self $response): Economy
    {
        return new Economy(
			new EconomyIdVO($response->getId()),
			new EconomyStartMonthVO($response->getStartMonth()),
			new EconomyEndMonthVO($response->getEndMonth()),
			new EconomyAccountIdVO($response->getAccountId()),
			new EconomyEconomicManagementVO($response->getEconomicManagement()),
			new EconomyActiveVO($response->getActive()),
			new EconomyCreatedAtVO($response->getCreatedAt()),
			new EconomyUpdatedAtVO($response->getUpdatedAt()),

        );
    }

    public static function SelfEconomyResponse($economy): self
    {
        return new self(
			$economy->getId()->value(),
			$economy->getStartMonth()->value(),
			$economy->getEndMonth()->value(),
			$economy->getAccountId()->value(),
			$economy->getEconomicManagement()->value(),
			$economy->getActive()->value(),
			$economy->getCreatedAt()->value(),
			$economy->getUpdatedAt()->value(),
        );
    }

}
