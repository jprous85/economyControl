<?php

namespace Tests\Role\Application\Request;

use Src\Role\Application\Request\CreateRoleRequest;
use Tests\Role\Domain\Role\ValueObjects\RoleNameVOMother;


final class CreateRoleRequestMother
{
    public static function create(
		string $name,

    ): CreateRoleRequest
    {
        return new CreateRoleRequest(
				$name,
        );
    }

    public static function random(): CreateRoleRequest
    {
		$name = RoleNameVOMother::random()->value();

        return self::create(
				$name
        );
    }

}
