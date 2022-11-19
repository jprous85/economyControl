<?php


namespace Src\Role\Application\Request;

class DeleteRoleRequest
{
    public function __construct(private int $id)
    {
    }

    public function getId(): int
    {
        return $this->id;
    }
}
