<?php


namespace Src\Account\Application\Request;

class ShowAccountUuidRequest
{
    public function __construct(private string $uuid)
    {
    }

    public function getUuid(): string
    {
        return $this->uuid;
    }
}
