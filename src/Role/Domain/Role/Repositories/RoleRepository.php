<?php

namespace Src\Role\Domain\Role\Repositories;

use Src\Role\Domain\Role\Role;
use Src\Role\Domain\Role\ValueObjects\RoleIdVO;

interface RoleRepository
{
    public function show(RoleIdVO $id): ?Role;

    public function showAll(): array;

    public function save(Role $role): RoleIdVO;

    public function update(Role $role): void;

    public function delete(RoleIdVO $id): void;
}
