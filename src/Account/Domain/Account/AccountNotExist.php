<?php

declare(strict_types = 1);

namespace Src\Account\Domain\Account;

use Src\Shared\Domain\DomainError;

final class AccountNotExist extends DomainError
{
    public function __construct(private int $id)
    {
        parent::__construct();
    }

    public function errorCode(): string
    {
        return 'account_not_exist';
    }

    protected function errorMessage(): string
    {
        return sprintf('The account <%s> does not exist', $this->id);
    }
}
