<?php

namespace __BasePath__\__ModuleName__\Domain\__ModuleName__\Repositories;

use __BasePath__\__ModuleName__\Domain\__ModuleName__\__ModuleName__;
use __BasePath__\__ModuleName__\Domain\__ModuleName__\ValueObjects\__ModuleName__IdVO;

interface __ModuleName__Repository
{
    public function show(/* __ModuleName__IdVO */ $id): ?__ModuleName__;

    public function showAll(): array;

    public function save(__ModuleName__ $__ModuleMinUnderscoreName__): /* __ModuleName__IdVO */;

    public function update(__ModuleName__ $__ModuleMinUnderscoreName__): void;

    public function delete(/* __ModuleName__IdVO */ $id): void;
}
