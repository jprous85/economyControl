<?php

declare(strict_types=1);

namespace Src\Role\Infrastructure\Persistence\ORM;

use Src\Role\Domain\Role\Role;
use Src\Role\Domain\Role\Repositories\RoleRepository;

use Src\Role\Domain\Role\ValueObjects\RoleIdVO;
use Src\Role\Domain\Role\ValueObjects\RoleNameVO;
use Src\Role\Domain\Role\ValueObjects\RoleActiveVO;
use Src\Role\Domain\Role\ValueObjects\RoleCreatedAtVO;
use Src\Role\Domain\Role\ValueObjects\RoleUpdatedAtVO;
use Src\Role\Infrastructure\Adapter\RoleAdapter;


final class RoleMYSQLRepository implements RoleRepository
{

    public function __construct(private RoleORMModel $model)
    {
    }

    public function show(RoleIdVO $id): ?Role
    {
        $eloquent_role = $this->model->find($id->value());
        return (new RoleAdapter($eloquent_role))->roleModelAdapter();
    }

    public function showAll(): array
    {
        $eloquent_roles = $this->model->all();
        $roles               = [];

        foreach ($eloquent_roles as $eloquent_role) {
            $roles[] = (new RoleAdapter($eloquent_role))->roleModelAdapter();
        }
        return $roles;

    }

    public function save(Role $role): RoleIdVO
    {
        $response    = $this->model->create($role->getPrimitives());
        return new RoleIdVO($response->id);
    }

    public function update(Role $role): void
    {
        $update_role = $this->model->find($role->getId()->value());
        $update_role->update($role->getPrimitives());

    }

    public function delete(RoleIdVO $id): void
    {
        $role = $this->model->find($id->value());
        $role->delete();
    }
}
