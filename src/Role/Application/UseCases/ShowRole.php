<?php

declare(strict_types = 1);

namespace Src\Role\Application\UseCases;

use Src\Role\Application\Request\ShowRoleRequest;
use Src\Role\Application\Response\RoleResponse;
use Src\Role\Domain\Role\RoleNotExist;
use Src\Role\Domain\Role\Repositories\RoleRepository;
use Src\Role\Domain\Role\ValueObjects\RoleIdVO;


final class ShowRole
{
    public function __construct(private RoleRepository $repository)
    {}

    public function __invoke(ShowRoleRequest $id): RoleResponse
    {
        $roleID = new RoleIdVO($id->getId());
        $role = $this->repository->show($roleID);

        if (!$role)
        {
            throw new RoleNotExist($roleID->value());
        }

        return RoleResponse::SelfRoleResponse($role);
    }
}
