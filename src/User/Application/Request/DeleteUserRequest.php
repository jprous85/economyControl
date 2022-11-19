<?php


namespace Src\User\Application\Request;

class DeleteUserRequest
{
    public function __construct(private int $id)
    {
    }

    public function getId(): int
    {
        return $this->id;
    }
}
