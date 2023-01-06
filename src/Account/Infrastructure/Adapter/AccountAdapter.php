<?php

declare(strict_types=1);


namespace Src\Account\Infrastructure\Adapter;


use Src\Account\Domain\Account\Account;
use Src\Account\Domain\Account\Repositories\AccountAdapterRepository;
use Src\Account\Domain\Account\ValueObjects\AccountActiveVO;
use Src\Account\Domain\Account\ValueObjects\AccountCreatedAtVO;
use Src\Account\Domain\Account\ValueObjects\AccountDescriptionVO;
use Src\Account\Domain\Account\ValueObjects\AccountIdVO;
use Src\Account\Domain\Account\ValueObjects\AccountNameVO;
use Src\Account\Domain\Account\ValueObjects\AccountOwnersAccountVO;
use Src\Account\Domain\Account\ValueObjects\AccountUpdatedAtVO;
use Src\Account\Domain\Account\ValueObjects\AccountUsersVO;
use Src\Account\Domain\Account\ValueObjects\AccountUuidVO;
use Src\Account\Infrastructure\Persistence\ORM\AccountORMModel;

final class AccountAdapter implements AccountAdapterRepository
{

    public function __construct(private AccountORMModel $account)
    {
    }

    private function getId(): int {
        return $this->account['id'];
    }

    private function getUUid(): string
    {
        return $this->account['uuid'];
    }

    private function getName(): string {
        return $this->account['name'];
    }

    private function getDescription(): ?string {
        return $this->account['description'];
    }

    private function getUsers(): string {
        return $this->account['users'];
    }

    private function getOwnersAccount(): string {
        return $this->account['owners_account'];
    }

    private function getActive(): int {
        return $this->account['active'];
    }

    private function getCreatedAt(): ?string {
        return $this->account['created_at']->toDateString();
    }

    private function getUpdatedAt(): ?string {
        return $this->account['updated_at']?->toDateString();
    }

    public function accountModelAdapter(): ?Account
    {
        if ($this->account == null) {
            return null;
        }

        return new Account(
            new AccountIdVO($this->getId()),
            new AccountUuidVO($this->getUUid()),
            new AccountNameVO($this->getName()),
            new AccountDescriptionVO($this->getDescription()),
            new AccountUsersVO($this->getUsers()),
            new AccountOwnersAccountVO($this->getOwnersAccount()),
            new AccountActiveVO($this->getActive()),
            new AccountCreatedAtVO($this->getCreatedAt()),
            new AccountUpdatedAtVO($this->getUpdatedAt() ?? ''),
        );
    }

}
