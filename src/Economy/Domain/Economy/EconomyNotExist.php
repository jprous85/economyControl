<?php

declare(strict_types = 1);

namespace Src\Economy\Domain\Economy;

use Src\Shared\Domain\DomainError;

final class EconomyNotExist extends DomainError
{
    public function __construct(private int $id)
    {
        parent::__construct();
    }

    public function errorCode(): string
    {
        return 'economy_not_exist';
    }

    protected function errorMessage(): string
    {
        return sprintf('The economy <%s> does not exist', $this->id);
    }
}
