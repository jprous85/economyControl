<?php

namespace Src\Account\Application\Request;

class CreateAccountRequest
{
    public function __construct(
		private string $name,
		private string $users,
		private string $ownersAccount
    )
    {
    }

	public function getName(): string {
		return $this->name;
	}

	public function getUsers(): string {
		return $this->users;
	}

    public function getOwnersAccount(): string
    {
        return $this->ownersAccount;
    }

}
