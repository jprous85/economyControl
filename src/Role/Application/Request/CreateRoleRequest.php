<?php

namespace Src\Role\Application\Request;

class CreateRoleRequest
{
    public function __construct(
		private string $name
    )
    {
    }

	public function getName(): string {
		return $this->name;
	}
}
