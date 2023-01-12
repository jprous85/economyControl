<?php

declare(strict_types=1);


namespace Tests\Account\Application\Request;


use Src\Account\Application\Request\ModifyOwnerAccountRequest;
use Tests\Account\Domain\Account\ValueObjects\AccountUuidVOMother;
use Tests\User\Domain\User\ValueObjects\UserIdVOMother;

final class ModifyOwnersAccountRequestMother
{
    public static function create(string $uuid, int $userId): ModifyOwnerAccountRequest
    {
        return new ModifyOwnerAccountRequest($uuid, $userId);
    }

    public static function random(): ModifyOwnerAccountRequest
    {
        $uuid = AccountUuidVOMother::random()->value();
        $userId = UserIdVOMother::random()->value();
        return self::create($uuid, $userId);
    }
}
