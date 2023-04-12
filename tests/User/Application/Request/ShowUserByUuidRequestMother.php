<?php

namespace Tests\User\Application\Request;

use Src\User\Application\Request\ShowUserUuidRequest;
use Tests\User\Domain\User\ValueObjects\UserUuidVOMother;


class ShowUserByUuidRequestMother
{
    public static function create(string $value): ShowUserUuidRequest
    {
        return new ShowUserUuidRequest($value);
    }

    public static function random(): ShowUserUuidRequest
    {
        $id = UserUuidVOMother::random()->value();
        return self::create($id);
    }

    private static function wrong(): ShowUserUuidRequest
    {
        $id = UserUuidVOMother::badValue()->value();
        return self::create($id);
    }
}
