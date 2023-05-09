<?php

declare(strict_types = 1);

namespace Src\Economy\Domain\Economy;

use Src\Shared\Domain\DomainError;

final class AccountUuidEconomyNotExist extends DomainError
{
    public function __construct(private string $uuid)
    {
        parent::__construct();
    }

    public function errorCode(): string
    {
        return 'economy_not_exist';
    }

    protected function errorMessage(): string
    {
        return sprintf('The economy by uuid account <%s> does not exist', $this->uuid);
    }
}
