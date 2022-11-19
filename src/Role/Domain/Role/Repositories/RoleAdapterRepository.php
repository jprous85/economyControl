<?php

declare(strict_types=1);


namespace Src\Role\Domain\Role\Repositories;


use Src\Role\Domain\Role\Role;

interface RoleAdapterRepository
{
    public function roleModelAdapter(): ?Role;
}
