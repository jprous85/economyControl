<?php

declare(strict_types=1);


namespace Src\Economy\Application\Request;


final class AddEconomyExpensesRequest
{
    public function __construct(
        private string $uuid,
        private string $name,
        private float $amount,
        private bool $paid,
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

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function getPaid(): bool
    {
        return $this->paid;
    }
    public function getActive(): bool
    {
        return $this->active;
    }

}
