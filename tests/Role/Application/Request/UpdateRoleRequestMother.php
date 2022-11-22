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
		string $name,
		int $active

    ): UpdateRoleRequest
    {
        return new UpdateRoleRequest(
				$name,
				$active,
        );
    }

    public static function random(): UpdateRoleRequest
    {
		$name = RoleNameVOMother::random()->value();
		$active = RoleActiveVOMother::random()->value();

        return self::create(
				$name,
				$active,

        );
    }

}
