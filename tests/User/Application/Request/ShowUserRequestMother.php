<?php

namespace Tests\User\Application\Request;

use Src\User\Application\Request\ShowUserRequest;
use Tests\User\Domain\User\ValueObjects\UserIdVOMother;


class ShowUserRequestMother
{
    public static function create(int $value): ShowUserRequest
    {
        return new ShowUserRequest($value);
    }

    public static function random(): ShowUserRequest
    {
        $id = UserIdVOMother::random()->value();
        return self::create($id);
    }

    private static function wrong(): ShowUserRequest
    {
        $id = UserIdVOMother::badValue()->value();
        return self::create($id);
    }
}
