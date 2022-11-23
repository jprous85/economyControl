<?php

namespace Src\Account\Application\Request;

class UpdateAccountRequest
{
    public function __construct(
		private int $id,
		private string $name,
		private json $users,
		private int $active,
		private ?string $created_at,
		private ?string $updated_at
    )
    {
    }

	public function getId(): int {
		return $this->id;
	}

	public function getName(): string {
		return $this->name;
	}

	public function getUsers(): json {
		return $this->users;
	}

	public function getActive(): int {
		return $this->active;
	}

	public function getCreatedAt(): ?string {
		return $this->created_at;
	}

	public function getUpdatedAt(): ?string {
		return $this->updated_at;
	}


}
