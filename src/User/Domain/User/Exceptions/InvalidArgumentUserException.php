<?php

declare(strict_types=1);


namespace Src\User\Domain\User\Exceptions;


use Src\Shared\Domain\DomainError;

final class InvalidArgumentUserException extends DomainError
{
    public function __construct()
    {
        parent::__construct();
    }

    public function errorCode(): string
    {
        return 'user_not_exist';
    }

    protected function errorMessage(): string
    {
        return 'Account Users cannot be empty';
    }
}
