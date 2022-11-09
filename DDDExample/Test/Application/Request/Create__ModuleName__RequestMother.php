<?php

namespace Tests\__ModuleName__\Application\Request;

use __BasePath__\__ModuleName__\Application\Request\Create__ModuleName__Request;
// -- uses of vo mother-- //

use Faker\Factory;

final class Create__ModuleName__RequestMother
{
    public static function create(
// -- underscore variable with his nullable or not type in request mother --//
    ): Create__ModuleName__Request
    {
        return new Create__ModuleName__Request(
// -- parameters in request mother functions -- //
        );
    }

    public static function random(): Create__ModuleName__Request
    {
// -- parameters vo mother in function request mother -- //
        return self::create(
// -- parameters in request mother functions -- //
        );
    }

}
