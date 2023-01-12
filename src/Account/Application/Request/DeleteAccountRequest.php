<?php


namespace Src\Account\Application\Request;

class DeleteAccountRequest
{
    public function __construct(private string $uuid)
    {
    }

    public function getUuid(): string
    {
        return $this->uuid;
    }
}
