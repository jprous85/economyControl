<?php

declare(strict_types=1);


namespace Src\Auth\Domain\Repository;


interface AuthRepository
{
    public function login(): string;
}
