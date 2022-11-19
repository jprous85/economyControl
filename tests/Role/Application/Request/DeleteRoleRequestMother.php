<?php

namespace Tests\Role\Application\Request;

use Src\Role\Application\Request\DeleteRoleRequest;
use Tests\Role\Domain\Role\ValueObjects\RoleIdVOMother;


class DeleteRoleRequestMother
{
    public static function create($value): DeleteRoleRequest
    {
        return new DeleteRoleRequest($value);
    }

    public static function random(): DeleteRoleRequest
    {
        $id = RoleIdVOMother::random()->value();
        return self::create($id);
    }

    private static function wrong(): DeleteRoleRequest
    {
        $id = RoleIdVOMother::badValue()->value();
        return self::create($id);
    }
}
