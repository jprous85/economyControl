<?php

declare(strict_types=1);

namespace Src\Economy\Application\Response;


use Src\Economy\Domain\Economy\Economy;

use Src\Economy\Domain\Economy\ValueObjects\EconomyIdVO;
use Src\Economy\Domain\Economy\ValueObjects\EconomyStartMonthVO;
use Src\Economy\Domain\Economy\ValueObjects\EconomyEndMonthVO;
use Src\Economy\Domain\Economy\ValueObjects\EconomyAccountUuidVO;
use Src\Economy\Domain\Economy\ValueObjects\EconomyEconomicManagementVO;
use Src\Economy\Domain\Economy\ValueObjects\EconomyActiveVO;
use Src\Economy\Domain\Economy\ValueObjects\EconomyCreatedAtVO;
use Src\Economy\Domain\Economy\ValueObjects\EconomyUpdatedAtVO;
use Src\Shared\Infrastructure\CryptoAndDecrypt\CryptoAndDecrypt;


final class EconomyResponse
{
    public function __construct(
		private int $id,
		private string $start_month,
		private string $end_month,
		private string $account_uuid,
		private array $economic_management,
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

	public function getAccountUuid(): string {
		return $this->account_uuid;
	}

	public function getEconomicManagement(): array {
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
			"account_id" => $this->account_uuid,
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
			new EconomyAccountUuidVO($response->getAccountUuid()),
			new EconomyEconomicManagementVO(json_encode($response->getEconomicManagement())),
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
			$economy->getAccountUuid()->value(),
            json_decode(CryptoAndDecrypt::decrypt($economy->getEconomicManagement()->value()), true),
			$economy->getActive()->value(),
			$economy->getCreatedAt()->value(),
			$economy->getUpdatedAt()->value(),
        );
    }

}
