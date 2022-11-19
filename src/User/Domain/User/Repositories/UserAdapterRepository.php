<?php

namespace Src\User\Domain\User\Repositories;

use Src\User\Domain\User\User;

interface UserAdapterRepository
{
    public function userModelAdapter(): ?User;
}
