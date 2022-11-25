<?php

declare(strict_types=1);

namespace Src\Account\Infrastructure\Persistence\ORM;

use Src\Account\Domain\Account\Account;
use Src\Account\Domain\Account\Repositories\AccountRepository;

use Src\Account\Domain\Account\ValueObjects\AccountIdVO;
use Src\Account\Domain\Account\ValueObjects\AccountNameVO;
use Src\Account\Domain\Account\ValueObjects\AccountUsersVO;
use Src\Account\Domain\Account\ValueObjects\AccountActiveVO;
use Src\Account\Domain\Account\ValueObjects\AccountCreatedAtVO;
use Src\Account\Domain\Account\ValueObjects\AccountUpdatedAtVO;
use Src\Account\Infrastructure\Adapter\AccountAdapter;


final class AccountMYSQLRepository implements AccountRepository
{

    public function __construct(private AccountORMModel $model)
    {
    }

    public function show(AccountIdVO $id): ?Account
    {
        $eloquent_accounts = $this->model->find($id->value());
        return (new AccountAdapter($eloquent_accounts))->accountModelAdapter();
    }

    public function showAll(): array
    {
        $eloquent_accounts = $this->model->all();
        $accounts               = [];

        foreach ($eloquent_accounts as $eloquent_account) {
            $accounts[] = (new AccountAdapter($eloquent_account))->accountModelAdapter();
        }
        return $accounts;

    }

    public function save(Account $account): AccountIdVO
    {
        $response    = $this->model->create($account->getPrimitives());
        return new AccountIdVO($response->id);
    }

    public function update(Account $account): void
    {
        $update_account = $this->model->find($account->getId()->value());
        $update_account->update($account->getPrimitives());

    }

    public function delete(AccountIdVO $id): void
    {
        $account = $this->model->find($id->value());
        $account->delete();
    }

    private static function fillDataMapper($account): ?Account
    {
        return $account ? new Account(
			new AccountIdVO($account->id),
			new AccountNameVO($account->name),
			new AccountUsersVO($account->users),
			new AccountActiveVO($account->active),
			new AccountCreatedAtVO($account->created_at),
			new AccountUpdatedAtVO($account->updated_at),

        ) : null;
    }
}
