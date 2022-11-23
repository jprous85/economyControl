<?php


namespace Src\Account\Application\Request;

class ShowAccountRequest
{
    public function __construct(private int $id)
    {
    }

    public function getId(): int
    {
        return $this->id;
    }
}
