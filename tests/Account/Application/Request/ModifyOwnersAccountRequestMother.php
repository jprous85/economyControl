<?php

declare(strict_types=1);


namespace Tests\Account\Application\Request;


use Src\Account\Application\Request\ModifyOwnerAccountRequest;
use Tests\Account\Domain\Account\ValueObjects\AccountIdVOMother;
use Tests\User\Domain\User\ValueObjects\UserIdVOMother;

final class ModifyOwnersAccountRequestMother
{
    public static function create(int $id, int $userId): ModifyOwnerAccountRequest
    {
        return new ModifyOwnerAccountRequest($id, $userId);
    }

    public static function random(): ModifyOwnerAccountRequest
    {
        $id = AccountIdVOMother::random()->value();
        $userId = UserIdVOMother::random()->value();
        return self::create($id, $userId);
    }
}
