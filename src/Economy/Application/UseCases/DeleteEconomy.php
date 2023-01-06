<?php

declare(strict_types = 1);

namespace Src\Economy\Application\UseCases;

use Src\Economy\Application\Request\DeleteEconomyRequest;
use Src\Economy\Domain\Economy\Repositories\EconomyRepository;
use Src\Economy\Domain\Economy\ValueObjects\EconomyIdVO;


final class DeleteEconomy
{
    public function __construct(private EconomyRepository $repository)
    {
    }

    public function __invoke(DeleteEconomyRequest $request)
    {
        $economy_id = new EconomyIdVO($request->getId());
        $this->repository->delete($economy_id);
    }
}
