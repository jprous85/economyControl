<?php

namespace Src\User\Domain\User\Repositories;

use Src\User\Domain\User\User;
use Src\User\Domain\User\ValueObjects\UserIdVO;
use Src\User\Domain\User\ValueObjects\UserUuidVO;

interface UserRepository
{
    public function show(UserIdVO $id): ?User;

    public function byUuid(UserUuidVO $userID): ?User;

    public function showAll(): array;

    public function save(User $user): UserIdVO;

    public function update(User $user): void;

    public function delete(UserIdVO $id): void;

    public function getAccountUsers(array $users): array;

}
