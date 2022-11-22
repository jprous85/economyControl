<?php

declare(strict_types=1);

namespace Src\Role\Application\UseCases;

use Src\Role\Application\Request\ShowRoleRequest;
use Src\Role\Application\Request\UpdateRoleRequest;
use Src\Role\Application\Response\RoleResponse;
use Src\Role\Domain\Role\Repositories\RoleRepository;
use Src\Role\Domain\Role\Role;

use Src\Role\Domain\Role\ValueObjects\RoleNameVO;
use Src\Role\Domain\Role\ValueObjects\RoleActiveVO;


final class UpdateRole
{
    private ShowRole $show__role;

    public function __construct(private RoleRepository $repository)
    {
        $this->show__role = new ShowRole($this->repository);
    }

    public function __invoke(int $id, UpdateRoleRequest $request)
    {
        $response = ($this->show__role)(new ShowRoleRequest($id));
        $role     = RoleResponse::responseToEntity($response);

        $role = $this->mapper($role, $request);
        $this->repository->update($role);
    }

    private function mapper(Role $role, $request): Role
    {
        $name   = $request->getName() ? new RoleNameVO($request->getName()) : $role->getName();
        $active = $request->getActive() ? new RoleActiveVO($request->getActive()) : $role->getActive();

        $role->update(
            $name,
            $active
        );

        return $role;
    }
}
