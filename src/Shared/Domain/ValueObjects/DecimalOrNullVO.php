<?php

declare(strict_types=1);

namespace Src\Shared\Domain\ValueObjects;


abstract class DecimalOrNullVO
{
    private ?float $value;

    public function __construct(?float $value)
    {
        $this->value = $value;
    }

    public function value(): ?float
    {
        return $this->value;
    }
}
