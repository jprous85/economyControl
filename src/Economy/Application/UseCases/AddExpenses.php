<?php

declare(strict_types=1);


namespace Src\Economy\Application\UseCases;


use JsonException;
use Src\Economy\Application\Request\AddEconomyExpensesRequest;
use Src\Economy\Domain\Economy\Economy;
use Src\Economy\Domain\Economy\Repositories\EconomyRepository;
use Src\Shared\Infrastructure\CryptoAndDecrypt\CryptoAndDecrypt;

final class AddExpenses
{
    public function __construct(private EconomyRepository $repository)
    {
    }

    /**
     * @throws JsonException
     */
    public function __invoke(Economy $economy, AddEconomyExpensesRequest $request)
    {

        $income['uuid'] = $request->getUuid();
        $income['name'] = $request->getName();
        $income['amount'] = $request->getAmount();
        $income['paid'] = $request->getPaid();
        $income['active'] = $request->getActive();

        $economy->addSpent($income);
        $economy->encryptedEconomyManagement(CryptoAndDecrypt::encrypt($economy->getEconomicManagement()->value()));
        $this->repository->update($economy);
    }
}
