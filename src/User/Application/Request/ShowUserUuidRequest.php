<?php


namespace Src\User\Application\Request;

class ShowUserUuidRequest
{
    public function __construct(private string $uuid)
    {
    }

    public function getUuid(): string
    {
        return $this->uuid;
    }
}
