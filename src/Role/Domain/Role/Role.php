<?php

declare(strict_types = 1);

namespace Src\Role\Domain\Role;


use Src\Role\Domain\Role\ValueObjects\RoleIdVO;
use Src\Role\Domain\Role\ValueObjects\RoleNameVO;
use Src\Role\Domain\Role\ValueObjects\RoleActiveVO;
use Src\Role\Domain\Role\ValueObjects\RoleCreatedAtVO;
use Src\Role\Domain\Role\ValueObjects\RoleUpdatedAtVO;


final class Role
{
    public function __construct(
		private RoleIdVO $id,
		private RoleNameVO $name,
		private RoleActiveVO $active,
		private ?RoleCreatedAtVO $created_at,
		private ?RoleUpdatedAtVO $updated_at,

    )
    {}

    public static function create(
		RoleIdVO $id,
		RoleNameVO $name,
		RoleActiveVO $active,
		RoleCreatedAtVO $created_at,
		RoleUpdatedAtVO $updated_at,

    ): Role
    {
        $role =  new self(
				$id,
				$name,
				$active,
				$created_at,
				$updated_at,

        );


        return $role;
    }

    public function update(
		RoleIdVO $id,
		RoleNameVO $name,
		RoleActiveVO $active,
		RoleCreatedAtVO $created_at,
		RoleUpdatedAtVO $updated_at,

    ): void
    {
		$this->id = $id;
		$this->name = $name;
		$this->active = $active;
		$this->created_at = $created_at;
		$this->updated_at = $updated_at;

    }

    public function getPrimitives(): array
    {
        return [
			'id' => $this->getId()->value(),
			'name' => $this->getName()->value(),
			'active' => $this->getActive()->value(),
			'created_at' => $this->getCreatedAt()->value(),
			'updated_at' => $this->getUpdatedAt()->value(),

        ];
    }

    /**
     * Getters
     */
	public function getId(): RoleIdVO {
		return $this->id;
	}

	public function getName(): RoleNameVO {
		return $this->name;
	}

	public function getActive(): RoleActiveVO {
		return $this->active;
	}

	public function getCreatedAt(): ?RoleCreatedAtVO {
		return $this->created_at;
	}

	public function getUpdatedAt(): ?RoleUpdatedAtVO {
		return $this->updated_at;
	}


}
