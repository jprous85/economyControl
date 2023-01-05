<?php

declare(strict_types = 1);

namespace Src\Economy\Application\UseCases;

use Src\Economy\Application\Request\ShowEconomyRequest;
use Src\Economy\Application\Response\EconomyResponse;
use Src\Economy\Domain\Economy\Repositories\EconomyRepository;
use Src\Economy\Domain\Economy\ValueObjects\EconomyAccountIdVO;
use Src\Economy\Domain\Economy\ValueObjects\EconomyIdVO;


final class ShowEconomy
{
    public function __construct(private EconomyRepository $repository)
    {}

    public function __invoke(ShowEconomyRequest $id): ?EconomyResponse
    {
        $economyID = new EconomyAccountIdVO($id->getId());
        $economy = $this->repository->show($economyID);

        if (!$economy)
        {
            return null;
        }

        return EconomyResponse::SelfEconomyResponse($economy);
    }
}
