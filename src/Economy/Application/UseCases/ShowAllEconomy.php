<?php

declare(strict_types = 1);

namespace Src\Economy\Application\UseCases;

use Src\Economy\Application\Response\EconomyResponse;
use Src\Economy\Application\Response\EconomyResponses;
use Src\Economy\Domain\Economy\Repositories\EconomyRepository;

final class ShowAllEconomy
{
    public function __construct(private EconomyRepository $repository)
    {}

    public function __invoke(): EconomyResponses
    {
        return new EconomyResponses(...$this->map($this->repository->showAll()));
    }

    private function map($economyes): array
    {
        $economy_array = [];
        foreach ($economyes as $economy) {
            $economy_array[] = EconomyResponse::SelfEconomyResponse($economy);
        }
        return $economy_array;
    }
}
