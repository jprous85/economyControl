<?php


namespace Src\User\Application\Request;

class ShowUserRequest
{
    public function __construct(private int $id)
    {
    }

    public function getId(): int
    {
        return $this->id;
    }
}
