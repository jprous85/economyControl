<?php

declare(strict_types=1);


namespace Src\Auth\Infrastructure\Persistence;


use Src\Auth\Domain\Repository\AuthRepository;

final class AuthORMPersistence implements AuthRepository
{

    public function __construct()
    {
    }

    public function login(): string
    {
        // TODO: Implement login() method.
    }
}
