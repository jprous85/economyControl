<?php

declare(strict_types=1);


namespace Tests\Account\Application\Request;


use Src\Account\Application\Request\ModifyUserAccountRequest;
use Src\Account\Domain\Account\ValueObjects\AccountUuidVO;
use Tests\Account\Domain\Account\ValueObjects\AccountIdVOMother;
use Tests\Account\Domain\Account\ValueObjects\AccountUuidVOMother;
use Tests\User\Domain\User\ValueObjects\UserIdVOMother;

final class ModifyUserAccountRequestMother
{
    public static function create(string $uuid, int $userId): ModifyUserAccountRequest
    {
        return new ModifyUserAccountRequest($uuid, $userId);
    }

    public static function random(): ModifyUserAccountRequest
    {
        $uuid = AccountUuidVOMother::random()->value();
        $userId = UserIdVOMother::random()->value();
        return self::create($uuid, $userId);
    }
}
