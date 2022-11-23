<?php

namespace Tests\Economy\Application\Request;

use Src\Economy\Application\Request\ShowEconomyRequest;
use Tests\Economy\Domain\Economy\ValueObjects\EconomyIdVOMother;


class ShowEconomyRequestMother
{
    public static function create(int $value): ShowEconomyRequest
    {
        return new ShowEconomyRequest($value);
    }

    public static function random(): ShowEconomyRequest
    {
        $id = EconomyIdVOMother::random()->value();
        return self::create($id);
    }

    private static function wrong(): ShowEconomyRequest
    {
        $id = EconomyIdVOMother::badValue()->value();
        return self::create($id);
    }
}
