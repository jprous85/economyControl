<?php

declare(strict_types=1);


namespace Src\Economy\Application\UseCases;


use JsonException;
use Src\Economy\Application\Request\UpdateEconomyIncomeManagementRequest;
use Src\Economy\Domain\Economy\Economy;
use Src\Economy\Domain\Economy\Repositories\EconomyRepository;
use Src\Shared\Infrastructure\CryptoAndDecrypt\CryptoAndDecrypt;

final class UpdateIncome
{
    public function __construct(private EconomyRepository $repository)
    {
    }

    /**
     * @throws JsonException
     */
    public function __invoke(Economy $economy, UpdateEconomyIncomeManagementRequest $request)
    {
        $income['uuid']     = $request->getUuid();
        $income['name']     = $request->getName();
        $income['category'] = $request->getCategory() ?? 'Other';
        $income['amount']   = $request->getAmount();
        $income['active']   = $request->getActive();

        $economy->updateIncome($income);
        $economy->encryptedEconomyManagement(CryptoAndDecrypt::encrypt($economy->getEconomicManagement()->value()));
        $this->repository->update($economy);
    }
}
