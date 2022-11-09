<?php

namespace Tests\__ModuleName__\Domain\__ModuleName__;

use __BasePath__\__ModuleName__\Domain\__ModuleName__\__ModuleName__;

// -- uses of vo -- //
// -- uses of vo mother-- //

final class __ModuleName__Mother
{
    public static function create(
// -- parameters of entities mother functions -- //
    ): __ModuleName__
    {
        return new __ModuleName__(
// -- create entity mother parameters in create function -- //
        );
    }

    public static function random(): __ModuleName__
    {
        return self::create(
// -- vo mother random vale in entities mother -- //
        );
    }
}
