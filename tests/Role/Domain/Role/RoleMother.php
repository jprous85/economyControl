<?php

namespace Tests\Role\Domain\Role;

use Src\Role\Domain\Role\Role;

use Src\Role\Domain\Role\ValueObjects\RoleIdVO;
use Src\Role\Domain\Role\ValueObjects\RoleNameVO;
use Src\Role\Domain\Role\ValueObjects\RoleActiveVO;
use Src\Role\Domain\Role\ValueObjects\RoleCreatedAtVO;
use Src\Role\Domain\Role\ValueObjects\RoleUpdatedAtVO;

use Tests\Role\Domain\Role\ValueObjects\RoleIdVOMother;
use Tests\Role\Domain\Role\ValueObjects\RoleNameVOMother;
use Tests\Role\Domain\Role\ValueObjects\RoleActiveVOMother;
use Tests\Role\Domain\Role\ValueObjects\RoleCreatedAtVOMother;
use Tests\Role\Domain\Role\ValueObjects\RoleUpdatedAtVOMother;


final class RoleMother
{
    public static function create(
		RoleIdVO $id,
		RoleNameVO $name,
		RoleActiveVO $active,
		RoleCreatedAtVO $created_at,
		RoleUpdatedAtVO $updated_at,

    ): Role
    {
        return new Role(
				$id,
				$name,
				$active,
				$created_at,
				$updated_at,

        );
    }

    public static function random(): Role
    {
        return self::create(
			RoleIdVOMother::random(),
			RoleNameVOMother::random(),
			RoleActiveVOMother::random(),
			RoleCreatedAtVOMother::random(),
			RoleUpdatedAtVOMother::random(),

        );
    }
}
