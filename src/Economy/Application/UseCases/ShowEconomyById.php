<?php

declare(strict_types = 1);

namespace Src\Economy\Application\UseCases;

use Src\Economy\Application\Request\EconomyAccountUuidRequest;
use Src\Economy\Application\Request\EconomyIdRequest;
use Src\Economy\Application\Response\EconomyResponse;
use Src\Economy\Domain\Economy\Repositories\EconomyRepository;
use Src\Economy\Domain\Economy\ValueObjects\EconomyAccountUuidVO;
use Src\Economy\Domain\Economy\ValueObjects\EconomyIdVO;


final class ShowEconomyById
{
    public function __construct(private EconomyRepository $repository)
    {}

    public function __invoke(EconomyIdRequest $idRequest): ?EconomyResponse
    {
        $accountUuid = new EconomyIdVO($idRequest->getId());
        $economy = $this->repository->economyById($accountUuid);

        if (!$economy)
        {
            return null;
        }

        return EconomyResponse::SelfEconomyResponse($economy);
    }
}
