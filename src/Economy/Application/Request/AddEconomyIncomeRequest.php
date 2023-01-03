<?php

declare(strict_types=1);


namespace Src\Economy\Application\Request;


final class AddEconomyIncomeRequest
{
    public function __construct(
        private string $uuid,
        private string $name,
        private ?string $category,
        private float $amount,
        private bool $active,
    )
    {
    }

    public function getUuid(): string
    {
        return $this->uuid;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }


    public function getActive(): bool
    {
        return $this->active;
    }

}
