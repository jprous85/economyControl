<?php

namespace Tests\User\Application\Request;

use Src\User\Application\Request\DeleteUserRequest;
use Tests\User\Domain\User\ValueObjects\UserIdVOMother;


class DeleteUserRequestMother
{
    public static function create($value): DeleteUserRequest
    {
        return new DeleteUserRequest($value);
    }

    public static function random(): DeleteUserRequest
    {
        $id = UserIdVOMother::random()->value();
        return self::create($id);
    }

    private static function wrong(): DeleteUserRequest
    {
        $id = UserIdVOMother::badValue()->value();
        return self::create($id);
    }
}
