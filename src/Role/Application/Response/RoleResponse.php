<?php

declare(strict_types=1);

namespace Src\Role\Application\Response;


use Src\Role\Domain\Role\Role;

use Src\Role\Domain\Role\ValueObjects\RoleIdVO;
use Src\Role\Domain\Role\ValueObjects\RoleNameVO;
use Src\Role\Domain\Role\ValueObjects\RoleActiveVO;
use Src\Role\Domain\Role\ValueObjects\RoleCreatedAtVO;
use Src\Role\Domain\Role\ValueObjects\RoleUpdatedAtVO;


final class RoleResponse
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



    public function toArray(): array
    {
        return [
			"id" => $this->id,
			"name" => $this->name,
			"active" => $this->active,
			"created_at" => $this->created_at,
			"updated_at" => $this->updated_at,

        ];
    }

    public static function responseToEntity(self $response): Role
    {
        return new Role(
			new RoleIdVO($response->getId()),
			new RoleNameVO($response->getName()),
			new RoleActiveVO($response->getActive()),
			new RoleCreatedAtVO($response->getCreatedAt()),
			new RoleUpdatedAtVO($response->getUpdatedAt()),

        );
    }

    public static function SelfRoleResponse($role): self
    {
        return new self(
			$role->getId()->value(),
			$role->getName()->value(),
			$role->getActive()->value(),
			$role->getCreatedAt()->value(),
			$role->getUpdatedAt()->value(),

        );
    }

}
