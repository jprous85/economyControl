<?php

declare(strict_types=1);


namespace Tests\Account\Application\Request;


use Src\Account\Application\Request\DeleteUserAccountRequest;
use Tests\Account\Domain\Account\ValueObjects\AccountIdVOMother;
use Tests\User\Domain\User\ValueObjects\UserIdVOMother;

final class DeleteUserAccountRequestMother
{
    public static function create(int $id, int $userId): DeleteUserAccountRequest
    {
        return new DeleteUserAccountRequest($id, $userId);
    }

    public static function random(): DeleteUserAccountRequest
    {
        $id = AccountIdVOMother::random()->value();
        $userId = UserIdVOMother::random()->value();
        return self::create($id, $userId);
    }
}
