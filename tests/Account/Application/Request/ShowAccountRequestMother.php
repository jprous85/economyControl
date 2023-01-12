<?php

namespace Tests\Account\Application\Request;

use Src\Account\Application\Request\ShowAccountUuidRequest;
use Tests\Account\Domain\Account\ValueObjects\AccountIdVOMother;
use Tests\Account\Domain\Account\ValueObjects\AccountUuidVOMother;


class ShowAccountRequestMother
{
    public static function create(string $value): ShowAccountUuidRequest
    {
        return new ShowAccountUuidRequest($value);
    }

    public static function random(): ShowAccountUuidRequest
    {
        $uuid = AccountUuidVOMother::random()->value();
        return self::create($uuid);
    }

    private static function wrong(): ShowAccountUuidRequest
    {
        $id = AccountIdVOMother::badValue()->value();
        return self::create($id);
    }
}
