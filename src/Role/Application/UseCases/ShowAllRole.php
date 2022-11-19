<?php

declare(strict_types = 1);

namespace Src\Role\Application\UseCases;

use Src\Role\Application\Response\RoleResponse;
use Src\Role\Application\Response\RoleResponses;
use Src\Role\Domain\Role\Repositories\RoleRepository;

final class ShowAllRole
{
    public function __construct(private RoleRepository $repository)
    {}

    public function __invoke(): RoleResponses
    {
        return new RoleResponses(...$this->map($this->repository->showAll()));
    }

    private function map($roles): array
    {
        $role_array = [];
        foreach ($roles as $role) {
            $role_array[] = RoleResponse::SelfRoleResponse($role);
        }
        return $role_array;
    }
}
