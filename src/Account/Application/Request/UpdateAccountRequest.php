<?php

namespace Src\Account\Application\Request;

class UpdateAccountRequest
{
    public function __construct(
        private string  $name,
        private ?string $description,
        private int     $active
    )
    {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function getActive(): int
    {
        return $this->active;
    }
}
