<?php

declare(strict_types = 1);

namespace __BasePath__\__ModuleName__\Application\UseCases;

use __BasePath__\__ModuleName__\Application\Response\__ModuleName__Response;
use __BasePath__\__ModuleName__\Application\Response\__ModuleName__Responses;
use __BasePath__\__ModuleName__\Domain\__ModuleName__\Repositories\__ModuleName__Repository;

final class ShowAll__ModuleName__
{
    public function __construct(private __ModuleName__Repository $repository)
    {}

    public function __invoke(): __ModuleName__Responses
    {
        return new __ModuleName__Responses(...$this->map($this->repository->showAll()));
    }

    private function map($__ModuleMinUnderscoreNameWithPlural__): array
    {
        $__ModuleMinUnderscoreName___array = [];
        foreach ($__ModuleMinUnderscoreNameWithPlural__ as $__ModuleMinUnderscoreName__) {
            $__ModuleMinUnderscoreName___array[] = __ModuleName__Response::Self__ModuleName__Response($__ModuleMinUnderscoreName__);
        }
        return $__ModuleMinUnderscoreName___array;
    }
}
