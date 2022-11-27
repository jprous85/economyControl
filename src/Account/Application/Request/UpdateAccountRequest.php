<?php

namespace Src\Account\Application\Request;

class UpdateAccountRequest
{
    public function __construct(
		private string $name,
		private string $users,
		private string $ownersAccount,
		private int $active
    )
    {
    }

	public function getName(): string {
		return $this->name;
	}

	public function getUsers(): string {
		return $this->users;
	}

    public function getOwnersAccount(): string {
		return $this->ownersAccount;
	}

	public function getActive(): int {
		return $this->active;
	}
}
