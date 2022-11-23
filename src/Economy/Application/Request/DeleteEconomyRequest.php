<?php


namespace Src\Economy\Application\Request;

class DeleteEconomyRequest
{
    public function __construct(private int $id)
    {
    }

    public function getId(): int
    {
        return $this->id;
    }
}
