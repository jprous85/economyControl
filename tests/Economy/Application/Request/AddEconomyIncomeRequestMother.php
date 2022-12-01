<?php

declare(strict_types=1);

namespace Tests\Economy\Application\Request;

use Src\Economy\Application\Request\AddEconomyIncomeRequest;
use Faker\Factory;

final class AddEconomyIncomeRequestMother
{
    public static function create(
        string $uuid,
        string $name,
        float  $amount,
        bool   $active
    ): AddEconomyIncomeRequest
    {
        return new AddEconomyIncomeRequest(
            $uuid,
            $name,
            $amount,
            $active
        );
    }

    public static function random(): AddEconomyIncomeRequest
    {
        $faker = Factory::create();

        $uuid   = $faker->uuid;
        $name   = $faker->name;
        $amount = $faker->randomFloat();
        $active = $faker->boolean;

        return self::create(
            $uuid,
            $name,
            $amount,
            $active
        );
    }
}
