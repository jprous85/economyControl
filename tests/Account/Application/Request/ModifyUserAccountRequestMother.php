<?php

declare(strict_types=1);


namespace Tests\Account\Application\Request;


use Src\Account\Application\Request\ModifyUserAccountRequest;
use Tests\Account\Domain\Account\ValueObjects\AccountIdVOMother;
use Tests\User\Domain\User\ValueObjects\UserIdVOMother;

final class ModifyUserAccountRequestMother
{
    public static function create(int $id, int $userId): ModifyUserAccountRequest
    {
        return new ModifyUserAccountRequest($id, $userId);
    }

    public static function random(): ModifyUserAccountRequest
    {
        $id = AccountIdVOMother::random()->value();
        $userId = UserIdVOMother::random()->value();
        return self::create($id, $userId);
    }
}
