<?php

namespace Tests\Role\Application\Request;

use Src\Role\Application\Request\ShowRoleRequest;
use Tests\Role\Domain\Role\ValueObjects\RoleIdVOMother;


class ShowRoleRequestMother
{
    public static function create(int $value): ShowRoleRequest
    {
        return new ShowRoleRequest($value);
    }

    public static function random(): ShowRoleRequest
    {
        $id = RoleIdVOMother::random()->value();
        return self::create($id);
    }

    private static function wrong(): ShowRoleRequest
    {
        $id = RoleIdVOMother::badValue()->value();
        return self::create($id);
    }
}
