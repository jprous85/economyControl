<?php

declare(strict_types=1);

namespace Src\Economy\Application\UseCases;

use Src\Economy\Application\Request\ShowEconomyRequest;
use Src\Economy\Application\Request\UpdateEconomyRequest;
use Src\Economy\Application\Response\EconomyResponse;
use Src\Economy\Domain\Economy\Repositories\EconomyRepository;
use Src\Economy\Domain\Economy\Economy;

use Src\Economy\Domain\Economy\ValueObjects\EconomyStartMonthVO;
use Src\Economy\Domain\Economy\ValueObjects\EconomyEndMonthVO;
use Src\Economy\Domain\Economy\ValueObjects\EconomyAccountIdVO;
use Src\Economy\Domain\Economy\ValueObjects\EconomyEconomicManagementVO;
use Src\Economy\Domain\Economy\ValueObjects\EconomyActiveVO;


final class UpdateEconomy
{
    private ShowEconomy $show__economy;

    public function __construct(private EconomyRepository $repository)
    {
        $this->show__economy = new ShowEconomy($this->repository);
    }

    public function __invoke(int $id, UpdateEconomyRequest $request)
    {
        $response = ($this->show__economy)(new ShowEconomyRequest($id));
        $economy  = EconomyResponse::responseToEntity($response);

        $economy = $this->mapper($economy, $request);
        $this->repository->update($economy);
    }

    private function mapper(Economy $economy, $request): Economy
    {
        $start_month         = $request->getStartMonth() ? new EconomyStartMonthVO($request->getStartMonth()) : $economy->getStartMonth();
        $end_month           = $request->getEndMonth() ? new EconomyEndMonthVO($request->getEndMonth()) : $economy->getEndMonth();
        $account_id          = $request->getAccountId() ? new EconomyAccountIdVO($request->getAccountId()) : $economy->getAccountId();
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
