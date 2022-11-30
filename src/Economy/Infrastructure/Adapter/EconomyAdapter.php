<?php

declare(strict_types=1);


namespace Src\Economy\Infrastructure\Adapter;


use Src\Economy\Domain\Economy\Economy;
use Src\Economy\Domain\Economy\Repositories\EconomyAdapterRepository;
use Src\Economy\Domain\Economy\ValueObjects\EconomyAccountIdVO;
use Src\Economy\Domain\Economy\ValueObjects\EconomyActiveVO;
use Src\Economy\Domain\Economy\ValueObjects\EconomyCreatedAtVO;
use Src\Economy\Domain\Economy\ValueObjects\EconomyEconomicManagementVO;
use Src\Economy\Domain\Economy\ValueObjects\EconomyEndMonthVO;
use Src\Economy\Domain\Economy\ValueObjects\EconomyIdVO;
use Src\Economy\Domain\Economy\ValueObjects\EconomyStartMonthVO;
use Src\Economy\Domain\Economy\ValueObjects\EconomyUpdatedAtVO;
use Src\Economy\Infrastructure\Persistence\ORM\EconomyORMModel;

final class EconomyAdapter implements EconomyAdapterRepository
{

    public function __construct(private EconomyORMModel $economy)
    {
    }

    public function economyModelAdapter(): ?Economy
    {
        if (!$this->economy) {
            return null;
        }

        return new Economy(
            new EconomyIdVO($this->getId()),
            new EconomyStartMonthVO($this->getStartMonth()),
            new EconomyEndMonthVO($this->getEndMonth()),
            new EconomyAccountIdVO($this->getAccountId()),
            new EconomyEconomicManagementVO($this->getEconomicManagement()),
            new EconomyActiveVO($this->getActive()),
            new EconomyCreatedAtVO($this->getCreatedAt()),
            new EconomyUpdatedAtVO($this->getUpdatedAt() ?? ''),
        );
    }

    private function getId(): int {
        return $this->economy['id'];
    }

    private function getStartMonth(): string {
        return $this->economy['start_month'];
    }

    private function getEndMonth(): string {
        return $this->economy['end_month'];
    }

    private function getAccountId(): int {
        return $this->economy['account_id'];
    }

    private function getEconomicManagement(): string {
        return $this->economy['economic_management'];
    }

    private function getActive(): int {
        return $this->economy['active'];
    }

    private function getCreatedAt(): ?string {
        return $this->economy['created_at']?->format('Y-m-d');
    }

    private function getUpdatedAt(): ?string {
        return $this->economy['updated_at'];
    }
}
