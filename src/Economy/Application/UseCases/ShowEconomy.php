<?php

declare(strict_types = 1);

namespace Src\Economy\Application\UseCases;

use Src\Economy\Application\Request\EconomyAccountUuidRequest;
use Src\Economy\Application\Response\EconomyResponse;
use Src\Economy\Domain\Economy\Repositories\EconomyRepository;
use Src\Economy\Domain\Economy\ValueObjects\EconomyAccountUuidVO;


final class ShowEconomy
{
    public function __construct(private EconomyRepository $repository)
    {}

    public function __invoke(EconomyAccountUuidRequest $accountUuidRequest): ?EconomyResponse
    {
        $accountUuid = new EconomyAccountUuidVO($accountUuidRequest->getUuid());
        $economy = $this->repository->show($accountUuid);

        if (!$economy)
        {
            return null;
        }

        return EconomyResponse::SelfEconomyResponse($economy);
    }
}
