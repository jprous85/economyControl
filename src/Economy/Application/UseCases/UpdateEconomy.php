<?php

declare(strict_types=1);

namespace Src\Economy\Application\UseCases;

use Src\Economy\Application\Request\UpdateEconomyRequest;
use Src\Economy\Domain\Economy\Repositories\EconomyRepository;
use Src\Economy\Domain\Economy\Economy;

use Src\Economy\Domain\Economy\ValueObjects\EconomyIdVO;
use Src\Economy\Domain\Economy\ValueObjects\EconomyStartMonthVO;
use Src\Economy\Domain\Economy\ValueObjects\EconomyEndMonthVO;
use Src\Economy\Domain\Economy\ValueObjects\EconomyAccountUuidVO;
use Src\Economy\Domain\Economy\ValueObjects\EconomyEconomicManagementVO;
use Src\Economy\Domain\Economy\ValueObjects\EconomyActiveVO;


final class UpdateEconomy
{
    public function __construct(private EconomyRepository $repository)
    {
    }

    public function __invoke(int $id, UpdateEconomyRequest $request)
    {
        $economy = $this->repository->economyById(new EconomyIdVO($id));

        $economyMapper = $this->mapper($economy, $request);
        $this->repository->update($economyMapper);
    }

    private function mapper(Economy $economy, $request): Economy
    {
        $start_month         = $request->getStartMonth() ? new EconomyStartMonthVO($request->getStartMonth()) : $economy->getStartMonth();
        $end_month           = $request->getEndMonth() ? new EconomyEndMonthVO($request->getEndMonth()) : $economy->getEndMonth();
        $account_id          = $request->getAccountUuid() ? new EconomyAccountUuidVO($request->getAccountUuid()) : $economy->getAccountUuid();
        $economic_management = $request->getEconomicManagement() ? new EconomyEconomicManagementVO($request->getEconomicManagement()) : $economy->getEconomicManagement();
        $active              = $request->getActive() ? new EconomyActiveVO($request->getActive()) : $economy->getActive();

        $economy->update(
            $start_month,
            $end_month,
            $account_id,
            $economic_management,
            $active
        );

        return $economy;
    }
}
