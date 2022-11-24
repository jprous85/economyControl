<?php

declare(strict_types = 1);

namespace Src\Economy\Application\UseCases;

use Src\Economy\Application\Request\CreateEconomyRequest;
use Src\Economy\Domain\Economy\Economy;
use Src\Economy\Domain\Economy\Repositories\EconomyRepository;

use Src\Economy\Domain\Economy\ValueObjects\EconomyStartMonthVO;
use Src\Economy\Domain\Economy\ValueObjects\EconomyEndMonthVO;
use Src\Economy\Domain\Economy\ValueObjects\EconomyAccountIdVO;
use Src\Economy\Domain\Economy\ValueObjects\EconomyEconomicManagementVO;


final class CreateEconomy
{

    public function __construct(private EconomyRepository $repository)
    {
    }

    public function __invoke(CreateEconomyRequest $request): int
    {
        $economy = self::mapper($request);
        $economy_id = $this->repository->save($economy);
        return $economy_id->value();
    }

    private function mapper(CreateEconomyRequest $request): Economy
    {
        return Economy::create(
			new EconomyStartMonthVO($request->getStartMonth()),
			new EconomyEndMonthVO($request->getEndMonth()),
			new EconomyAccountIdVO($request->getAccountId()),
			new EconomyEconomicManagementVO($request->getEconomicManagement())
        );
    }
}
