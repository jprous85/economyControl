<?php

declare(strict_types=1);


namespace Src\Account\Application\Request;


final class ModifyOwnerAccountRequest
{
    public function __construct(
        private string $accountUuid,
        private int    $userId
    )
    {
    }

    /**
     * @return string
     */
    public function accountUuid(): string
    {
        return $this->accountUuid;
    }

    /**
     * @return int
     */
    public function userId(): int
    {
        return $this->userId;
    }


}
