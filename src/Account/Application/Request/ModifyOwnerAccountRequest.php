<?php

declare(strict_types=1);


namespace Src\Account\Application\Request;


final class ModifyOwnerAccountRequest
{
    public function __construct(
        private int $accountId,
        private int $userId
    )
    {
    }

    /**
     * @return int
     */
    public function accountId(): int
    {
        return $this->accountId;
    }

    /**
     * @return int
     */
    public function userId(): int
    {
        return $this->userId;
    }


}
