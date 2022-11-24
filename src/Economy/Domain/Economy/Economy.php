<?php

declare(strict_types=1);

namespace Src\Economy\Domain\Economy;

use Carbon\Carbon;
use Src\Economy\Domain\Economy\ValueObjects\EconomyIdVO;
use Src\Economy\Domain\Economy\ValueObjects\EconomyStartMonthVO;
use Src\Economy\Domain\Economy\ValueObjects\EconomyEndMonthVO;
use Src\Economy\Domain\Economy\ValueObjects\EconomyAccountIdVO;
use Src\Economy\Domain\Economy\ValueObjects\EconomyEconomicManagementVO;
use Src\Economy\Domain\Economy\ValueObjects\EconomyActiveVO;
use Src\Economy\Domain\Economy\ValueObjects\EconomyCreatedAtVO;
use Src\Economy\Domain\Economy\ValueObjects\EconomyUpdatedAtVO;


final class Economy
{
    public function __construct(
        private EconomyIdVO                 $id,
        private EconomyStartMonthVO         $start_month,
        private EconomyEndMonthVO           $end_month,
        private EconomyAccountIdVO          $account_id,
        private EconomyEconomicManagementVO $economic_management,
        private EconomyActiveVO             $active,
        private ?EconomyCreatedAtVO         $created_at,
        private ?EconomyUpdatedAtVO         $updated_at,

    )
    {
    }

    public static function create(
        EconomyStartMonthVO         $start_month,
        EconomyEndMonthVO           $end_month,
        EconomyAccountIdVO          $account_id,
        EconomyEconomicManagementVO $economic_management,

    ): Economy
    {
        return new self(
            new EconomyIdVO(null),
            $start_month,
            $end_month,
            $account_id,
            $economic_management,
            new EconomyActiveVO(1),
            new EconomyCreatedAtVO(Carbon::now('Europe/Madrid')->format('Y-m-d H:i:s')),
            new EconomyUpdatedAtVO(null),

        );
    }

    public function update(
        EconomyStartMonthVO         $start_month,
        EconomyEndMonthVO           $end_month,
        EconomyAccountIdVO          $account_id,
        EconomyEconomicManagementVO $economic_management,
        EconomyActiveVO             $active,

    ): void
    {
        $this->start_month         = $start_month;
        $this->end_month           = $end_month;
        $this->account_id          = $account_id;
        $this->economic_management = $economic_management;
        $this->active              = $active;
        $this->updated_at          = new EconomyUpdatedAtVO(Carbon::now('Europe/Madrid')->format('Y-m-d H:i:s'));
    }

    public function getPrimitives(): array
    {
        return [
            'id'                  => $this->getId()->value(),
            'start_month'         => $this->getStartMonth()->value(),
            'end_month'           => $this->getEndMonth()->value(),
            'account_id'          => $this->getAccountId()->value(),
            'economic_management' => $this->getEconomicManagement()->value(),
            'active'              => $this->getActive()->value(),
            'created_at'          => $this->getCreatedAt()->value(),
            'updated_at'          => $this->getUpdatedAt()->value(),

        ];
    }

    /**
     * Getters
     */
    public function getId(): EconomyIdVO
    {
        return $this->id;
    }

    public function getStartMonth(): EconomyStartMonthVO
    {
        return $this->start_month;
    }

    public function getEndMonth(): EconomyEndMonthVO
    {
        return $this->end_month;
    }

    public function getAccountId(): EconomyAccountIdVO
    {
        return $this->account_id;
    }

    public function getEconomicManagement(): EconomyEconomicManagementVO
    {
        return $this->economic_management;
    }

    public function getActive(): EconomyActiveVO
    {
        return $this->active;
    }

    public function getCreatedAt(): ?EconomyCreatedAtVO
    {
        return $this->created_at;
    }

    public function getUpdatedAt(): ?EconomyUpdatedAtVO
    {
        return $this->updated_at;
    }

}
