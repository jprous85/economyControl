<?php

declare(strict_types = 1);

namespace Src\Role\Domain\Role;


use Carbon\Carbon;
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
		RoleNameVO $name

    ): Role
    {
        return new self(
				new RoleIdVO(null),
				$name,
				new RoleActiveVO(1),
				new RoleCreatedAtVO(Carbon::now('Europe/Madrid')->format('Y-m-d H:i:s')),
				new RoleUpdatedAtVO(null),

        );
    }

    public function update(
		RoleNameVO $name,
		RoleActiveVO $active,

    ): void
    {
		$this->name = $name;
		$this->active = $active;
		$this->updated_at = new RoleUpdatedAtVO(Carbon::now('Europe/Madrid')->format('Y-m-d H:i:s'));

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
