<?php

declare(strict_types = 1);

namespace Src\Role\Application\UseCases;

use Src\Role\Application\Request\CreateRoleRequest;
use Src\Role\Domain\Role\Role;
use Src\Role\Domain\Role\Repositories\RoleRepository;

use Src\Role\Domain\Role\ValueObjects\RoleIdVO;
use Src\Role\Domain\Role\ValueObjects\RoleNameVO;
use Src\Role\Domain\Role\ValueObjects\RoleActiveVO;
use Src\Role\Domain\Role\ValueObjects\RoleCreatedAtVO;
use Src\Role\Domain\Role\ValueObjects\RoleUpdatedAtVO;


final class CreateRole
{

    public function __construct(private RoleRepository $repository)
    {
    }

    public function __invoke(CreateRoleRequest $request): int
    {
        $role = self::mapper($request);
        $role_id = $this->repository->save($role);
        return $role_id->value();
    }

    private function mapper(CreateRoleRequest $request): Role
    {
        // TODO:: check with VO and return it
        return Role::create(
			new RoleNameVO($request->getName())
        );
    }
}
