<?php


namespace Src\Account\Application\Request;

class DeleteAccountRequest
{
    public function __construct(private int $id)
    {
    }

    public function getId(): int
    {
        return $this->id;
    }
}
