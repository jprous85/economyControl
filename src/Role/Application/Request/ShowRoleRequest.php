<?php


namespace Src\Role\Application\Request;

class ShowRoleRequest
{
    public function __construct(private int $id)
    {
    }

    public function getId(): int
    {
        return $this->id;
    }
}
