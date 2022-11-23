<?php

namespace Src\Account\Application\Request;

class CreateAccountRequest
{
    public function __construct(
		private string $name,
		private array $users
    )
    {
    }

	public function getName(): string {
		return $this->name;
	}

	public function getUsers(): array {
		return $this->users;
	}

}
