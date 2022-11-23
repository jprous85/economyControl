<?php

declare(strict_types = 1);

namespace Src\Economy\Application\UseCases;

use Src\Economy\Application\Request\DeleteEconomyRequest;
use Src\Economy\Application\Request\ShowEconomyRequest;
use Src\Economy\Domain\Economy\Repositories\EconomyRepository;
use Src\Economy\Domain\Economy\ValueObjects\EconomyIdVO;


final class DeleteEconomy
{
    private ShowEconomy $show__economy;

    public function __construct(private EconomyRepository $repository)
    {
        $this->show__economy = new ShowEconomy($this->repository);
    }

    public function __invoke(DeleteEconomyRequest $request)
    {
        $response = ($this->show__economy)(new ShowEconomyRequest($request->getId()));

        $economy_id = new EconomyIdVO($response->getId());
        $this->repository->delete($economy_id);
    }
}
