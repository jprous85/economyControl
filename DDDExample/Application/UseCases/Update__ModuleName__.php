<?php

declare(strict_types = 1);

namespace __BasePath__\__ModuleName__\Application\UseCases;

use __BasePath__\__ModuleName__\Application\Request\Show__ModuleName__Request;
use __BasePath__\__ModuleName__\Application\Request\Update__ModuleName__Request;
use __BasePath__\__ModuleName__\Application\Response\__ModuleName__Response;
use __BasePath__\__ModuleName__\Domain\__ModuleName__\Repositories\__ModuleName__Repository;
use __BasePath__\__ModuleName__\Domain\__ModuleName__\__ModuleName__;
use Src\Shared\Domain\Bus\Event\EventBus;

// -- uses of vo -- //

final class Update__ModuleName__
{
    private Show__ModuleName__ $show____ModuleMinUnderscoreName__;
    public function __construct(private __ModuleName__Repository $repository, private EventBus $eventBus)
    {
        $this->show____ModuleMinUnderscoreName__ = new Show__ModuleName__($this->repository);
    }

    public function __invoke(int $id, Update__ModuleName__Request $request)
    {
        $response = ($this->show____ModuleMinUnderscoreName__)(new Show__ModuleName__Request($id));
        $__ModuleMinUnderscoreName__ = __ModuleName__Response::responseToEntity($response);

        $__ModuleMinUnderscoreName__ = $this->mapper($__ModuleMinUnderscoreName__, $request);
        $this->repository->update($__ModuleMinUnderscoreName__);
        $this->eventBus->publish(...$__ModuleMinUnderscoreName__->pullDomainEvents());
    }

    private function mapper(__ModuleName__ $__ModuleMinUnderscoreName__, $request): __ModuleName__
    {
// -- request to entity in update mapper function -- //
        $__ModuleMinUnderscoreName__->update(
// -- parameters of request to entity in update mapper function -- //
        );

        return $__ModuleMinUnderscoreName__;
    }
}
