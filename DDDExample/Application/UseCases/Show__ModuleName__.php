<?php

declare(strict_types = 1);

namespace __BasePath__\__ModuleName__\Application\UseCases;

use __BasePath__\__ModuleName__\Application\Request\Show__ModuleName__Request;
use __BasePath__\__ModuleName__\Application\Response\__ModuleName__Response;
use __BasePath__\__ModuleName__\Domain\__ModuleName__\__ModuleName__NotExist;
use __BasePath__\__ModuleName__\Domain\__ModuleName__\Repositories\__ModuleName__Repository;
// -- uses of id vo -- //

final class Show__ModuleName__
{
    public function __construct(private __ModuleName__Repository $repository)
    {}

    public function __invoke(Show__ModuleName__Request $id): __ModuleName__Response
    {
        $__ModuleMinUnderscoreName__ID = new /* __ModuleName__IdVO */($id->getId());
        $__ModuleMinUnderscoreName__ = $this->repository->show($__ModuleMinUnderscoreName__ID);

        if (!$__ModuleMinUnderscoreName__)
        {
            throw new __ModuleName__NotExist($__ModuleMinUnderscoreName__ID->value());
        }

        return __ModuleName__Response::Self__ModuleName__Response($__ModuleMinUnderscoreName__);
    }
}
