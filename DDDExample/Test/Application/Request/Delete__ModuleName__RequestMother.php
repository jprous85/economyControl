<?php

namespace Tests\__ModuleName__\Application\Request;

use __BasePath__\__ModuleName__\Application\Request\Delete__ModuleName__Request;
// -- uses of id vo mother -- //

class Delete__ModuleName__RequestMother
{
    public static function create($value): Delete__ModuleName__Request
    {
        return new Delete__ModuleName__Request($value);
    }

    public static function random(): Delete__ModuleName__Request
    {
        $id = /* __ModuleName__IdVO */Mother::random()->value();
        return self::create($id);
    }

    private static function wrong(): Delete__ModuleName__Request
    {
        $id = /* __ModuleName__IdVO */Mother::badValue()->value();
        return self::create($id);
    }
}
