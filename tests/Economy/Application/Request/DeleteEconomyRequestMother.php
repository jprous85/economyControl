<?php

namespace Tests\Economy\Application\Request;

use Src\Economy\Application\Request\DeleteEconomyRequest;
use Tests\Economy\Domain\Economy\ValueObjects\EconomyIdVOMother;


class DeleteEconomyRequestMother
{
    public static function create($value): DeleteEconomyRequest
    {
        return new DeleteEconomyRequest($value);
    }

    public static function random(): DeleteEconomyRequest
    {
        $id = EconomyIdVOMother::random()->value();
        return self::create($id);
    }

    private static function wrong(): DeleteEconomyRequest
    {
        $id = EconomyIdVOMother::badValue()->value();
        return self::create($id);
    }
}
