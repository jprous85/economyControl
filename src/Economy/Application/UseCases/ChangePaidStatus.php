<?php

declare(strict_types=1);


namespace Src\Economy\Application\UseCases;


use JsonException;
use Src\Economy\Application\Request\EconomyPaidStatusRequest;
use Src\Economy\Domain\Economy\Economy;
use Src\Economy\Domain\Economy\Repositories\EconomyRepository;
use Src\Shared\Infrastructure\CryptoAndDecrypt\CryptoAndDecrypt;

final class ChangePaidStatus
{
    public function __construct(private EconomyRepository $repository)
    {
    }

    /**
     * @throws JsonException
     */
    public function __invoke(Economy $economy, EconomyPaidStatusRequest $request)
    {
        $register['uuid'] = $request->getUuid();
        $register['status'] = $request->getStatus();
        $economy->changePaidStatus($register);
        $economy->encryptedEconomyManagement(CryptoAndDecrypt::encrypt($economy->getEconomicManagement()->value()));
        $this->repository->update($economy);
    }
}
