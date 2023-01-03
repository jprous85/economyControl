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

        $spent['uuid']     = $request->getUuid();
        $spent['name']     = $request->getName();
        $spent['category'] = $request->getCategory() ?? 'Other';
        $spent['amount']   = $request->getAmount();
        $spent['paid']     = $request->getPaid();
        $spent['active']   = $request->getActive();

        $economy->addSpent($spent);
        $economy->encryptedEconomyManagement(CryptoAndDecrypt::encrypt($economy->getEconomicManagement()->value()));
        $this->repository->update($economy);
    }
}
