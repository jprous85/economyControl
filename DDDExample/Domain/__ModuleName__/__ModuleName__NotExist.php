<?php

declare(strict_types = 1);

namespace __BasePath__\__ModuleName__\Domain\__ModuleName__;

use Src\Shared\Domain\DomainError;

final class __ModuleName__NotExist extends DomainError
{
    public function __construct(private int $id)
    {
        parent::__construct();
    }

    public function errorCode(): string
    {
        return '__ModuleMinUnderscoreName___not_exist';
    }

    protected function errorMessage(): string
    {
        return sprintf('The __ModuleMinUnderscoreName__ <%s> does not exist', $this->id);
    }
}
