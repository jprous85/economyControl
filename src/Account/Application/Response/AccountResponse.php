<?php

declare(strict_types=1);

namespace Src\Account\Application\Response;


use Src\Account\Domain\Account\Account;

use Src\Account\Domain\Account\ValueObjects\AccountDescriptionVO;
use Src\Account\Domain\Account\ValueObjects\AccountIdVO;
use Src\Account\Domain\Account\ValueObjects\AccountNameVO;
use Src\Account\Domain\Account\ValueObjects\AccountOwnersAccountVO;
use Src\Account\Domain\Account\ValueObjects\AccountUsersVO;
use Src\Account\Domain\Account\ValueObjects\AccountActiveVO;
use Src\Account\Domain\Account\ValueObjects\AccountCreatedAtVO;
use Src\Account\Domain\Account\ValueObjects\AccountUpdatedAtVO;
use Src\Account\Domain\Account\ValueObjects\AccountUuidVO;


final class AccountResponse
{
    public function __construct(
        private int     $id,
        private string  $uuid,
        private string  $name,
        private ?string $description,
        private string  $users,
        private string  $ownersAccount,
        private int     $active,
        private ?string $created_at,
        private ?string $updated_at
    )
    {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getUuid(): string
    {
        return $this->uuid;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function getUsers(): string
    {
        return $this->users;
    }

    public function getOwnersAccount(): string
    {
        return $this->ownersAccount;
    }

    public function getActive(): int
    {
        return $this->active;
    }

    public function getCreatedAt(): ?string
    {
        return $this->created_at;
    }

    public function getUpdatedAt(): ?string
    {
        return $this->updated_at;
    }


    public function toArray(): array
    {
        return [
            "id"            => $this->id,
            "name"          => $this->name,
            "description"   => $this->description,
            "users"         => $this->users,
            "ownersAccount" => $this->ownersAccount,
            "active"        => $this->active,
            "created_at"    => $this->created_at,
            "updated_at"    => $this->updated_at,

        ];
    }

    public static function responseToEntity(self $response): Account
    {
        return new Account(
            new AccountIdVO($response->getId()),
            new AccountUuidVO($response->getUuid()),
            new AccountNameVO($response->getName()),
            new AccountDescriptionVO($response->getDescription()),
            new AccountUsersVO($response->getUsers()),
            new AccountOwnersAccountVO($response->getOwnersAccount()),
            new AccountActiveVO($response->getActive()),
            new AccountCreatedAtVO($response->getCreatedAt()),
            new AccountUpdatedAtVO($response->getUpdatedAt()),

        );
    }

    public static function SelfAccountResponse($account): self
    {
        return new self(
            $account->getId()->value(),
            $account->getUuid()->value(),
            $account->getName()->value(),
            $account->getDescription()->value(),
            $account->getUsers()->value(),
            $account->getOwnersAccount()->value(),
            $account->getActive()->value(),
            $account->getCreatedAt()->value(),
            $account->getUpdatedAt()->value()
        );
    }

}
