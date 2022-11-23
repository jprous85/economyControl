<?php

declare(strict_types = 1);

namespace Src\Economy\Domain\Economy;

use Src\Economy\Domain\Economy\Event\EconomyCreateDomainEvent;
use Src\Economy\Domain\Economy\Event\EconomyUpdateDomainEvent;
use Src\Shared\Domain\Aggregate\AggregateRoot;

use Src\Economy\Domain\Economy\ValueObjects\EconomyIdVO;
use Src\Economy\Domain\Economy\ValueObjects\EconomyStartMonthVO;
use Src\Economy\Domain\Economy\ValueObjects\EconomyEndMonthVO;
use Src\Economy\Domain\Economy\ValueObjects\EconomyAccountIdVO;
use Src\Economy\Domain\Economy\ValueObjects\EconomyEconomicManagementVO;
use Src\Economy\Domain\Economy\ValueObjects\EconomyActiveVO;
use Src\Economy\Domain\Economy\ValueObjects\EconomyCreatedAtVO;
use Src\Economy\Domain\Economy\ValueObjects\EconomyUpdatedAtVO;


final class Economy extends AggregateRoot
{
    public function __construct(
		private EconomyIdVO $id,
		private EconomyStartMonthVO $start_month,
		private EconomyEndMonthVO $end_month,
		private EconomyAccountIdVO $account_id,
		private EconomyEconomicManagementVO $economic_management,
		private EconomyActiveVO $active,
		private ?EconomyCreatedAtVO $created_at,
		private ?EconomyUpdatedAtVO $updated_at,

    )
    {}

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
        $economy =  new self(
				$id,
				$start_month,
				$end_month,
				$account_id,
				$economic_management,
				$active,
				$created_at,
				$updated_at,

        );

        $economy->addEvent(
            new EconomyCreateDomainEvent(
                null,
                $economy,
                $economy->getCreatedAt()->value()
            )
        );

        return $economy;
    }

    public function update(
		EconomyIdVO $id,
		EconomyStartMonthVO $start_month,
		EconomyEndMonthVO $end_month,
		EconomyAccountIdVO $account_id,
		EconomyEconomicManagementVO $economic_management,
		EconomyActiveVO $active,
		EconomyCreatedAtVO $created_at,
		EconomyUpdatedAtVO $updated_at,

    ): void
    {
		$this->id = $id;
		$this->start_month = $start_month;
		$this->end_month = $end_month;
		$this->account_id = $account_id;
		$this->economic_management = $economic_management;
		$this->active = $active;
		$this->created_at = $created_at;
		$this->updated_at = $updated_at;

        $this->addEvent(
            new EconomyUpdateDomainEvent(
                $this->id->value(),
                $this,
                $this->updated_at->value()
            )
        );
    }

    public function getPrimitives(): array
    {
        return [
			'id' => $this->getId()->value(),
			'start_month' => $this->getStartMonth()->value(),
			'end_month' => $this->getEndMonth()->value(),
			'account_id' => $this->getAccountId()->value(),
			'economic_management' => $this->getEconomicManagement()->value(),
			'active' => $this->getActive()->value(),
			'created_at' => $this->getCreatedAt()->value(),
			'updated_at' => $this->getUpdatedAt()->value(),

        ];
    }

    /**
     * Getters
     */
	public function getId(): EconomyIdVO {
		return $this->id;
	}

	public function getStartMonth(): EconomyStartMonthVO {
		return $this->start_month;
	}

	public function getEndMonth(): EconomyEndMonthVO {
		return $this->end_month;
	}

	public function getAccountId(): EconomyAccountIdVO {
		return $this->account_id;
	}

	public function getEconomicManagement(): EconomyEconomicManagementVO {
		return $this->economic_management;
	}

	public function getActive(): EconomyActiveVO {
		return $this->active;
	}

	public function getCreatedAt(): ?EconomyCreatedAtVO {
		return $this->created_at;
	}

	public function getUpdatedAt(): ?EconomyUpdatedAtVO {
		return $this->updated_at;
	}


}
