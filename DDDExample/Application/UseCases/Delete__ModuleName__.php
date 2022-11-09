<?php

declare(strict_types = 1);

namespace __BasePath__\__ModuleName__\Application\UseCases;

use __BasePath__\__ModuleName__\Application\Request\Delete__ModuleName__Request;
use __BasePath__\__ModuleName__\Application\Request\Show__ModuleName__Request;
use __BasePath__\__ModuleName__\Domain\__ModuleName__\Repositories\__ModuleName__Repository;
// -- uses of id vo -- //

final class Delete__ModuleName__
{
    private Show__ModuleName__ $show____ModuleMinUnderscoreName__;

    public function __construct(private __ModuleName__Repository $repository)
    {
        $this->show____ModuleMinUnderscoreName__ = new Show__ModuleName__($this->repository);
    }

    public function __invoke(Delete__ModuleName__Request $request)
    {
        $response = ($this->show____ModuleMinUnderscoreName__)(new Show__ModuleName__Request($request->getId()));

        $__ModuleMinUnderscoreName___id = new /* __ModuleName__IdVO */($response->getId());
        $this->repository->delete($__ModuleMinUnderscoreName___id);
    }
}
