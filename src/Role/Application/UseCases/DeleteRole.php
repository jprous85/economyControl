<?php

declare(strict_types = 1);

namespace Src\Role\Application\UseCases;

use Src\Role\Application\Request\DeleteRoleRequest;
use Src\Role\Application\Request\ShowRoleRequest;
use Src\Role\Domain\Role\Repositories\RoleRepository;
use Src\Role\Domain\Role\ValueObjects\RoleIdVO;


final class DeleteRole
{
    private ShowRole $show__role;

    public function __construct(private RoleRepository $repository)
    {
        $this->show__role = new ShowRole($this->repository);
    }

    public function __invoke(DeleteRoleRequest $request)
    {
        $response = ($this->show__role)(new ShowRoleRequest($request->getId()));

        $role_id = new RoleIdVO($response->getId());
        $this->repository->delete($role_id);
    }
}
