<?php

namespace Src\Account\Domain\Account\Repositories;

use Src\Account\Domain\Account\Account;
use Src\Account\Domain\Account\ValueObjects\AccountIdVO;

interface AccountRepository
{
    public function show(AccountIdVO $id): ?Account;

    public function showAll(): array;

    public function save(Account $account): void;

    public function update(Account $account): void;

    public function delete(AccountIdVO $id): void;

}
