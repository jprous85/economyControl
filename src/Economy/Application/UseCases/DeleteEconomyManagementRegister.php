<?php

declare(strict_types=1);


namespace Src\Economy\Application\UseCases;


use Src\Economy\Application\Request\EconomyUuidRequest;
use Src\Economy\Domain\Economy\Economy;
use Src\Economy\Domain\Economy\Repositories\EconomyRepository;
use Src\Shared\Infrastructure\CryptoAndDecrypt\CryptoAndDecrypt;

final class DeleteEconomyManagementRegister
{
    public function __construct(private EconomyRepository $repository)
    {
    }

    public function __invoke(Economy $economy, string $belong, EconomyUuidRequest $request)
    {
        $register['uuid'] = $request->getUuid();

        $economy->deleteEconomyManagementRegister($belong, $register);
        $economy->encryptedEconomyManagement(CryptoAndDecrypt::encrypt($economy->getEconomicManagement()->value()));
        $this->repository->update($economy);
    }
}
