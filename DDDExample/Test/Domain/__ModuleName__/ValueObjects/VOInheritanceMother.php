<?php

declare(strict_types=1);

namespace Tests\__ModuleName__\Domain\__ModuleName_Aggregate__\ValueObjects;

use __BasePath__\__ModuleName__\Domain\__ModuleName_Aggregate__\ValueObjects\__NameOfVO__;
use Faker\Factory;


final class __NameOfVO__Mother
{
    public static function create(__primitive__ $value)//__NameOfVO_return__
    {
        return new __NameOfVO__($value);
    }

    public static function random()//__NameOfVO_return__
    {
        $faker = Factory::create();
        return self::create();
    }
}
