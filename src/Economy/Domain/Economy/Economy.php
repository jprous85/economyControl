<?php

declare(strict_types=1);

namespace Src\Economy\Domain\Economy;

use Carbon\Carbon;
use JsonException;
use Src\Economy\Domain\Economy\ValueObjects\EconomyIdVO;
use Src\Economy\Domain\Economy\ValueObjects\EconomyStartMonthVO;
use Src\Economy\Domain\Economy\ValueObjects\EconomyEndMonthVO;
use Src\Economy\Domain\Economy\ValueObjects\EconomyAccountUuidVO;
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
        private EconomyAccountUuidVO        $account_uuid,
        private EconomyEconomicManagementVO $economic_management,
        private EconomyActiveVO             $active,
        private ?EconomyCreatedAtVO         $created_at,
        private ?EconomyUpdatedAtVO         $updated_at
    )
    {
    }

    public static function create(
        EconomyStartMonthVO         $start_month,
        EconomyEndMonthVO           $end_month,
        EconomyAccountUuidVO        $account_id,
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
        EconomyAccountUuidVO        $account_id,
        EconomyEconomicManagementVO $economic_management,
        EconomyActiveVO             $active
    ): void
    {
        $this->start_month         = $start_month;
        $this->end_month           = $end_month;
        $this->account_uuid          = $account_id;
        $this->economic_management = $economic_management;
        $this->active              = $active;

        $this->updatedAt();
    }

    public function getPrimitives(): array
    {
        return [
            'id'                  => $this->getId()->value(),
            'start_month'         => $this->getStartMonth()->value(),
            'end_month'           => $this->getEndMonth()->value(),
            'account_uuid'        => $this->getAccountUuid()->value(),
            'economic_management' => $this->getEconomicManagement()->value(),
            'active'              => $this->getActive()->value(),
            'created_at'          => $this->getCreatedAt()->value(),
            'updated_at'          => $this->getUpdatedAt()->value()
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

    public function getAccountUuid(): EconomyAccountUuidVO
    {
        return $this->account_uuid;
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


    public static function economyManagementStructure(): string
    {
        $structure = [
            "incomes"  => [],
            "expenses" => [],
            "totals"   => [
                "totalIncomes"  => 0,
                "totalExpenses" => 0,
                "totalPaid"     => 0,
                "pendingToPay"  => 0
            ]
        ];

        return json_encode($structure);
    }

    /**
     * @throws JsonException
     */
    public function addIncome(array $income)
    {
        $economicManagement              = json_decode($this->getEconomicManagement()->value(), true, FILTER_FLAG_STRIP_BACKTICK, JSON_THROW_ON_ERROR);
        $economicManagement['incomes'][] = $income;
        $this->calculateTotals($economicManagement);
        $this->economic_management = new EconomyEconomicManagementVO(json_encode($economicManagement));
        $this->updatedAt();
    }

    /**
     * @throws JsonException
     */
    public function addSpent(array $spent)
    {
        $economicManagement               = json_decode($this->getEconomicManagement()->value(), true, FILTER_FLAG_STRIP_BACKTICK, JSON_THROW_ON_ERROR);
        $economicManagement['expenses'][] = $spent;
        $this->calculateTotals($economicManagement);
        $this->economic_management = new EconomyEconomicManagementVO(json_encode($economicManagement));
        $this->updatedAt();
    }

    /**
     * @throws JsonException
     */
    public function deleteEconomyManagementRegister(string $belong, array $register)
    {
        $economicManagement = json_decode($this->getEconomicManagement()->value(), true, FILTER_FLAG_STRIP_BACKTICK, JSON_THROW_ON_ERROR);

        foreach ($economicManagement[$belong] as $key => $item) {
            if ($item['uuid'] === $register['uuid']) {
                unset($economicManagement[$belong][$key]);
            }
        }

        $this->calculateTotals($economicManagement);
        $this->economic_management = new EconomyEconomicManagementVO(json_encode($economicManagement));
        $this->updatedAt();
    }

    /**
     * @throws JsonException
     */
    public function changePaidStatus(array $register)
    {
        $economicManagement = json_decode($this->getEconomicManagement()->value(), true, FILTER_FLAG_STRIP_BACKTICK, JSON_THROW_ON_ERROR);

        foreach ($economicManagement['expenses'] as $key => $item) {
            if ($item['uuid'] === $register['uuid']) {
                $economicManagement['expenses'][$key]['paid'] = $register['status'];
            }
        }

        $this->calculateTotals($economicManagement);
        $this->economic_management = new EconomyEconomicManagementVO(json_encode($economicManagement));
        $this->updatedAt();
    }

    public function encryptedEconomyManagement($encrypted)
    {
        $this->economic_management = new EconomyEconomicManagementVO($encrypted);
    }

    private function updatedAt(): void
    {
        $this->updated_at = new EconomyUpdatedAtVO(Carbon::now('Europe/Madrid')->format('Y-m-d H:i:s'));
    }

    private function calculateTotals(&$economicManagement): void
    {
        $economicManagement['totals']['totalIncomes']  = $this->calculateIncomes($economicManagement['incomes']);
        $economicManagement['totals']['totalExpenses'] = $this->calculateTotalExpenses($economicManagement['expenses']);
        $economicManagement['totals']['totalPaid']     = $this->calculateExpenses($economicManagement['expenses']);
        $economicManagement['totals']['pendingToPay']  = $this->calculatePendingToPay($economicManagement['expenses']);
    }

    private function calculateIncomes($incomes): float
    {
        $total = 0;
        foreach ($incomes as $income) {
            $total += $income['amount'];
        }
        return $total;
    }

    private function calculateExpenses($expenses): float
    {
        $total = 0;
        foreach ($expenses as $spent) {
            if ($spent['paid']) {
                $total += $spent['amount'];
            }
        }
        return $total;
    }

    private function calculateTotalExpenses($expenses): float
    {
        $total = 0;
        foreach ($expenses as $spent) {
            $total += $spent['amount'];
        }
        return $total;
    }

    private function calculatePendingToPay($expenses): float
    {
        $total = 0;
        foreach ($expenses as $spent) {
            if (!$spent['paid']) {
                $total += $spent['amount'];
            }
        }
        return $total;
    }

}
