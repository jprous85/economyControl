<?php

declare(strict_types = 1);

namespace __BasePath__\__ModuleName__\Application\UseCases;

use __BasePath__\__ModuleName__\Application\Request\Create__ModuleName__Request;
use __BasePath__\__ModuleName__\Domain\__ModuleName__\__ModuleName__;
use __BasePath__\__ModuleName__\Domain\__ModuleName__\Repositories\__ModuleName__Repository;

use Src\Shared\Domain\Bus\Event\EventBus;

// -- uses of vo -- //

final class Create__ModuleName__
{

    public function __construct(private __ModuleName__Repository $repository, private EventBus $eventBus)
    {
    }

    public function __invoke(Create__ModuleName__Request $request): int
    {
        $__ModuleMinUnderscoreName__ = self::mapper($request);
        $__ModuleMinUnderscoreName___id = $this->repository->save($__ModuleMinUnderscoreName__);
        $this->eventBus->publish(...$__ModuleMinUnderscoreName__->pullDomainEvents());
        return $__ModuleMinUnderscoreName___id->value();
    }

    private function mapper(Create__ModuleName__Request $request): __ModuleName__
    {
        // TODO:: check with VO and return it
        return __ModuleName__::create(
// -- request to entity in create mapper function -- //
        );
    }
}
