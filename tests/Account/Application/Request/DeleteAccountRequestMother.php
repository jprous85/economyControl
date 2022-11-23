<?php

namespace Tests\Account\Application\Request;

use Src\Account\Application\Request\DeleteAccountRequest;
use Tests\Account\Domain\Account\ValueObjects\AccountIdVOMother;


class DeleteAccountRequestMother
{
    public static function create($value): DeleteAccountRequest
    {
        return new DeleteAccountRequest($value);
    }

    public static function random(): DeleteAccountRequest
    {
        $id = AccountIdVOMother::random()->value();
        return self::create($id);
    }

    private static function wrong(): DeleteAccountRequest
    {
        $id = AccountIdVOMother::badValue()->value();
        return self::create($id);
    }
}
