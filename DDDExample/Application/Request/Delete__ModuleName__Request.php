<?php


namespace __BasePath__\__ModuleName__\Application\Request;

class Delete__ModuleName__Request
{
    public function __construct(private int $id)
    {
    }

    public function getId(): int
    {
        return $this->id;
    }
}
