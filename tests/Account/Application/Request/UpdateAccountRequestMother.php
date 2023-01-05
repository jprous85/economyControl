<?php

namespace Tests\Account\Application\Request;

use Src\Account\Application\Request\UpdateAccountRequest;
use Tests\Account\Domain\Account\ValueObjects\AccountDescriptionVOMother;
use Tests\Account\Domain\Account\ValueObjects\AccountNameVOMother;
use Tests\Account\Domain\Account\ValueObjects\AccountActiveVOMother;


final class UpdateAccountRequestMother
{
    public static function create(
        string $name,
        string $description,
        int    $active

    ): UpdateAccountRequest
    {
        return new UpdateAccountRequest(
            $name,
            $description,
            $active
        );
    }

    public static function random(): UpdateAccountRequest
    {
        $name          = AccountNameVOMother::random()->value();
        $description   = AccountDescriptionVOMother::random()->value();
        $active        = AccountActiveVOMother::random()->value();

        return self::create(
            $name,
            $description,
            $active
        );
    }

}
