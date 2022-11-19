<?php

namespace Tests\Role\Infrastructure\Request;

use Tests\Role\Domain\Role\ValueObjects\RoleIdVOMother;
use Tests\Role\Domain\Role\ValueObjects\RoleNameVOMother;
use Tests\Role\Domain\Role\ValueObjects\RoleActiveVOMother;
use Tests\Role\Domain\Role\ValueObjects\RoleCreatedAtVOMother;
use Tests\Role\Domain\Role\ValueObjects\RoleUpdatedAtVOMother;


final class RoleRequestMother
{
    public static function random(): array
    {
        return [
			'id' => RoleIdVOMother::random()->value(),
			'name' => RoleNameVOMother::random()->value(),
			'active' => RoleActiveVOMother::random()->value(),
			'created_at' => RoleCreatedAtVOMother::random()->value(),
			'updated_at' => RoleUpdatedAtVOMother::random()->value(),

        ];
    }
}
