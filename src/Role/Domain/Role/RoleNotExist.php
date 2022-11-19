<?php

declare(strict_types = 1);

namespace Src\Role\Domain\Role;

use Src\Shared\Domain\DomainError;

final class RoleNotExist extends DomainError
{
    public function __construct(private int $id)
    {
        parent::__construct();
    }

    public function errorCode(): string
    {
        return 'role_not_exist';
    }

    protected function errorMessage(): string
    {
        return sprintf('The role <%s> does not exist', $this->id);
    }
}
