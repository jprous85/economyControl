<?php

namespace Src\Account\Domain\Account\Repositories;

use Src\Account\Domain\Account\Account;
use Src\Account\Domain\Account\ValueObjects\AccountIdVO;
use Src\User\Domain\User\ValueObjects\UserIdVO;

interface AccountRepository
{
    public function show(AccountIdVO $id): ?Account;

    public function showAll(): array;

    public function getAccountByUserId(UserIdVO $id): array;

    public function save(Account $account): void;

    public function update(Account $account): void;

    public function delete(AccountIdVO $id): void;


}
