<?php

declare(strict_types = 1);

namespace Src\Account\Domain\Account;

use Src\Account\Domain\Account\Event\AccountCreateDomainEvent;
use Src\Account\Domain\Account\Event\AccountUpdateDomainEvent;
use Src\Shared\Domain\Aggregate\AggregateRoot;

use Src\Account\Domain\Account\ValueObjects\AccountIdVO;
use Src\Account\Domain\Account\ValueObjects\AccountNameVO;
use Src\Account\Domain\Account\ValueObjects\AccountUsersVO;
use Src\Account\Domain\Account\ValueObjects\AccountActiveVO;
use Src\Account\Domain\Account\ValueObjects\AccountCreatedAtVO;
use Src\Account\Domain\Account\ValueObjects\AccountUpdatedAtVO;


final class Account extends AggregateRoot
{
    public function __construct(
		private AccountIdVO $id,
		private AccountNameVO $name,
		private AccountUsersVO $users,
		private AccountActiveVO $active,
		private ?AccountCreatedAtVO $created_at,
		private ?AccountUpdatedAtVO $updated_at,

    )
    {}

    public static function create(
		AccountIdVO $id,
		AccountNameVO $name,
		AccountUsersVO $users,
		AccountActiveVO $active,
		AccountCreatedAtVO $created_at,
		AccountUpdatedAtVO $updated_at,

    ): Account
    {
        $account =  new self(
				$id,
				$name,
				$users,
				$active,
				$created_at,
				$updated_at,

        );

        $account->addEvent(
            new AccountCreateDomainEvent(
                null,
                $account,
                $account->getCreatedAt()->value()
            )
        );

        return $account;
    }

    public function update(
		AccountIdVO $id,
		AccountNameVO $name,
		AccountUsersVO $users,
		AccountActiveVO $active,
		AccountCreatedAtVO $created_at,
		AccountUpdatedAtVO $updated_at,

    ): void
    {
		$this->id = $id;
		$this->name = $name;
		$this->users = $users;
		$this->active = $active;
		$this->created_at = $created_at;
		$this->updated_at = $updated_at;

        $this->addEvent(
            new AccountUpdateDomainEvent(
                $this->id->value(),
                $this,
                $this->updated_at->value()
            )
        );
    }

    public function getPrimitives(): array
    {
        return [
			'id' => $this->getId()->value(),
			'name' => $this->getName()->value(),
			'users' => $this->getUsers()->value(),
			'active' => $this->getActive()->value(),
			'created_at' => $this->getCreatedAt()->value(),
			'updated_at' => $this->getUpdatedAt()->value(),

        ];
    }

    /**
     * Getters
     */
	public function getId(): AccountIdVO {
		return $this->id;
	}

	public function getName(): AccountNameVO {
		return $this->name;
	}

	public function getUsers(): AccountUsersVO {
		return $this->users;
	}

	public function getActive(): AccountActiveVO {
		return $this->active;
	}

	public function getCreatedAt(): ?AccountCreatedAtVO {
		return $this->created_at;
	}

	public function getUpdatedAt(): ?AccountUpdatedAtVO {
		return $this->updated_at;
	}


}
