<?php

declare(strict_types=1);


namespace Src\Economy\Application\UseCases;


use JsonException;
use Src\Economy\Application\Request\EconomyFixedStatusRequest;
use Src\Economy\Application\Request\EconomyPaidStatusRequest;
use Src\Economy\Domain\Economy\Economy;
use Src\Economy\Domain\Economy\Repositories\EconomyRepository;
use Src\Shared\Infrastructure\CryptoAndDecrypt\CryptoAndDecrypt;

final class ChangeFixedStatus
{
    public function __construct(private EconomyRepository $repository)
    {
    }

    /**
     * @throws JsonException
     */
    public function __invoke(Economy $economy, EconomyFixedStatusRequest $request)
    {
        $register['uuid'] = $request->getUuid();
        $register['field'] = $request->getField();
        $register['fixed'] = $request->getFixed();
        $economy->changeFixedStatus($register);
        $economy->encryptedEconomyManagement(CryptoAndDecrypt::encrypt($economy->getEconomicManagement()->value()));
        $this->repository->update($economy);
    }
}
