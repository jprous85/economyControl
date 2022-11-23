<?php

declare(strict_types = 1);

namespace Src\Economy\Application\UseCases;

use Src\Economy\Application\Request\CreateEconomyRequest;
use Src\Economy\Domain\Economy\Economy;
use Src\Economy\Domain\Economy\Repositories\EconomyRepository;

use Src\Shared\Domain\Bus\Event\EventBus;

use Src\Economy\Domain\Economy\ValueObjects\EconomyIdVO;
use Src\Economy\Domain\Economy\ValueObjects\EconomyStartMonthVO;
use Src\Economy\Domain\Economy\ValueObjects\EconomyEndMonthVO;
use Src\Economy\Domain\Economy\ValueObjects\EconomyAccountIdVO;
use Src\Economy\Domain\Economy\ValueObjects\EconomyEconomicManagementVO;
use Src\Economy\Domain\Economy\ValueObjects\EconomyActiveVO;
use Src\Economy\Domain\Economy\ValueObjects\EconomyCreatedAtVO;
use Src\Economy\Domain\Economy\ValueObjects\EconomyUpdatedAtVO;


final class CreateEconomy
{

    public function __construct(private EconomyRepository $repository, private EventBus $eventBus)
    {
    }

    public function __invoke(CreateEconomyRequest $request): int
    {
        $economy = self::mapper($request);
        $economy_id = $this->repository->save($economy);
        $this->eventBus->publish(...$economy->pullDomainEvents());
        return $economy_id->value();
    }

    private function mapper(CreateEconomyRequest $request): Economy
    {
        // TODO:: check with VO and return it
        return Economy::create(
			new EconomyIdVO($request->getId()),
			new EconomyStartMonthVO($request->getStartMonth()),
			new EconomyEndMonthVO($request->getEndMonth()),
			new EconomyAccountIdVO($request->getAccountId()),
			new EconomyEconomicManagementVO($request->getEconomicManagement()),
			new EconomyActiveVO($request->getActive()),
			new EconomyCreatedAtVO($request->getCreatedAt()),
			new EconomyUpdatedAtVO($request->getUpdatedAt()),

        );
    }
}
