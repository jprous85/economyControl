<?php

declare(strict_types = 1);

namespace Src\Role\Application\UseCases;

use Src\Role\Application\Request\ShowRoleRequest;
use Src\Role\Application\Request\UpdateRoleRequest;
use Src\Role\Application\Response\RoleResponse;
use Src\Role\Domain\Role\Repositories\RoleRepository;
use Src\Role\Domain\Role\Role;
use Src\Shared\Domain\Bus\Event\EventBus;

use Src\Role\Domain\Role\ValueObjects\RoleIdVO;
use Src\Role\Domain\Role\ValueObjects\RoleNameVO;
use Src\Role\Domain\Role\ValueObjects\RoleActiveVO;
use Src\Role\Domain\Role\ValueObjects\RoleCreatedAtVO;
use Src\Role\Domain\Role\ValueObjects\RoleUpdatedAtVO;


final class UpdateRole
{
    private ShowRole $show__role;
    public function __construct(private RoleRepository $repository, private EventBus $eventBus)
    {
        $this->show__role = new ShowRole($this->repository);
    }

    public function __invoke(int $id, UpdateRoleRequest $request)
    {
        $response = ($this->show__role)(new ShowRoleRequest($id));
        $role = RoleResponse::responseToEntity($response);

        $role = $this->mapper($role, $request);
        $this->repository->update($role);
        $this->eventBus->publish(...$role->pullDomainEvents());
    }

    private function mapper(Role $role, $request): Role
    {
			$id = $request->getId() ? new RoleIdVO($request->getId()) : $role->getId();
			$name = $request->getName() ? new RoleNameVO($request->getName()) : $role->getName();
			$active = $request->getActive() ? new RoleActiveVO($request->getActive()) : $role->getActive();
			$created_at = $request->getCreatedAt() ? new RoleCreatedAtVO($request->getCreatedAt()) : $role->getCreatedAt();
			$updated_at = $request->getUpdatedAt() ? new RoleUpdatedAtVO($request->getUpdatedAt()) : $role->getUpdatedAt();

        $role->update(
				$id,
				$name,
				$active,
				$created_at,
				$updated_at,

        );

        return $role;
    }
}
