<?php

namespace Src\Role\Application\Request;

class UpdateRoleRequest
{
    public function __construct(
		private string $name,
		private int $active,
    )
    {
    }


	public function getName(): string {
		return $this->name;
	}

	public function getActive(): int {
		return $this->active;
	}
}
