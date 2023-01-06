<?php

namespace Tests\Economy\Application\Request;

use Src\Economy\Application\Request\EconomyAccountUuidRequest;
use Tests\Economy\Domain\Economy\ValueObjects\EconomyAccountUuidVOMother;
use Tests\Economy\Domain\Economy\ValueObjects\EconomyIdVOMother;


class ShowEconomyRequestMother
{
    public static function create(string $value): EconomyAccountUuidRequest
    {
        return new EconomyAccountUuidRequest($value);
    }

    public static function random(): EconomyAccountUuidRequest
    {
        $id = EconomyAccountUuidVOMother::random()->value();
        return self::create($id);
    }

    private static function wrong(): EconomyAccountUuidRequest
    {
        $id = EconomyIdVOMother::badValue()->value();
        return self::create($id);
    }
}
