<?php

declare(strict_types=1);

namespace Tests\__ModuleName__\Domain\__ModuleName_Aggregate__;

use __BasePath__\__ModuleName__\Domain\__ModuleName_Aggregate__\__ModuleName_Aggregate__;

final class __ModuleName_Aggregate__Mother
{
    private static function create(): __ModuleName_Aggregate__
    {
        return new __ModuleName_Aggregate__();
    }

    public function random(): __ModuleName_Aggregate__
    {
        return self::create();
    }
}
