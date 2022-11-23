<?php

namespace Src\Account\Application\Request;

class UpdateAccountRequest
{
    public function __construct(
		private string $name,
		private array $users,
		private int $active
    )
    {
    }

	public function getName(): string {
		return $this->name;
	}

	public function getUsers(): array {
		return $this->users;
	}

	public function getActive(): int {
		return $this->active;
	}
}
