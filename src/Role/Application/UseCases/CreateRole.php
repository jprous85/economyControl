<?php

declare(strict_types = 1);

namespace Src\Role\Application\UseCases;

use Src\Role\Application\Request\CreateRoleRequest;
use Src\Role\Domain\Role\Role;
use Src\Role\Domain\Role\Repositories\RoleRepository;

use Src\Shared\Domain\Bus\Event\EventBus;

use Src\Role\Domain\Role\ValueObjects\RoleIdVO;
use Src\Role\Domain\Role\ValueObjects\RoleNameVO;
use Src\Role\Domain\Role\ValueObjects\RoleActiveVO;
use Src\Role\Domain\Role\ValueObjects\RoleCreatedAtVO;
use Src\Role\Domain\Role\ValueObjects\RoleUpdatedAtVO;


final class CreateRole
{

    public function __construct(private RoleRepository $repository, private EventBus $eventBus)
    {
    }

    public function __invoke(CreateRoleRequest $request): int
    {
        $role = self::mapper($request);
        $role_id = $this->repository->save($role);
        $this->eventBus->publish(...$role->pullDomainEvents());
        return $role_id->value();
    }

    private function mapper(CreateRoleRequest $request): Role
    {
        // TODO:: check with VO and return it
        return Role::create(
			new RoleIdVO($request->getId()),
			new RoleNameVO($request->getName()),
			new RoleActiveVO($request->getActive()),
			new RoleCreatedAtVO($request->getCreatedAt()),
			new RoleUpdatedAtVO($request->getUpdatedAt()),

        );
    }
}
