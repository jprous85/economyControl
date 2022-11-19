<?php

namespace Tests\Role\Application\Request;

use Src\Role\Application\Request\UpdateRoleRequest;
use Tests\Role\Domain\Role\ValueObjects\RoleIdVOMother;
use Tests\Role\Domain\Role\ValueObjects\RoleNameVOMother;
use Tests\Role\Domain\Role\ValueObjects\RoleActiveVOMother;
use Tests\Role\Domain\Role\ValueObjects\RoleCreatedAtVOMother;
use Tests\Role\Domain\Role\ValueObjects\RoleUpdatedAtVOMother;


final class UpdateRoleRequestMother
{
    public static function create(
		int $id,
		string $name,
		int $active,
		?string $created_at,
		?string $updated_at,

    ): UpdateRoleRequest
    {
        return new UpdateRoleRequest(
				$id,
				$name,
				$active,
				$created_at,
				$updated_at,

        );
    }

    public static function random(): UpdateRoleRequest
    {
		$id = RoleIdVOMother::random()->value();
		$name = RoleNameVOMother::random()->value();
		$active = RoleActiveVOMother::random()->value();
		$created_at = RoleCreatedAtVOMother::random()->value();
		$updated_at = RoleUpdatedAtVOMother::random()->value();

        return self::create(
				$id,
				$name,
				$active,
				$created_at,
				$updated_at,

        );
    }

}
