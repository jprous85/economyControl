<?php

namespace Tests\Account\Application\Request;

use Src\Account\Application\Request\ShowAccountRequest;
use Tests\Account\Domain\Account\ValueObjects\AccountIdVOMother;


class ShowAccountRequestMother
{
    public static function create(int $value): ShowAccountRequest
    {
        return new ShowAccountRequest($value);
    }

    public static function random(): ShowAccountRequest
    {
        $id = AccountIdVOMother::random()->value();
        return self::create($id);
    }

    private static function wrong(): ShowAccountRequest
    {
        $id = AccountIdVOMother::badValue()->value();
        return self::create($id);
    }
}
