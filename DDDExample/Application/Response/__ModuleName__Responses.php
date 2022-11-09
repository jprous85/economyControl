<?php

declare(strict_types=1);

namespace __BasePath__\__ModuleName__\Application\Response;

final class __ModuleName__Responses
{
    private array $__ModuleMinUnderscoreName___responses;

    public function __construct(__ModuleName__Response ...$__ModuleMinUnderscoreName___responses)
    {
        $this->__ModuleMinUnderscoreName___responses = $__ModuleMinUnderscoreName___responses;
    }

    public function get__ModuleName__(): array
    {
        return $this->__ModuleMinUnderscoreName___responses;
    }

    public function toArray(): array
    {
        $__ModuleMinUnderscoreName___response_array = [];
        foreach ($this->__ModuleMinUnderscoreName___responses as $__ModuleMinUnderscoreName___response)
        {
            $__ModuleMinUnderscoreName___response_array[] = $__ModuleMinUnderscoreName___response->toArray();
        }
        return $__ModuleMinUnderscoreName___response_array;
    }
}
