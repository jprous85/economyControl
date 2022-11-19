<?php

namespace Src\Role\Application\Request;

class UpdateRoleRequest
{
    public function __construct(
		private int $id,
		private string $name,
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
