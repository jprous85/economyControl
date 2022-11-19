<?php

declare(strict_types=1);

namespace Src\Shared\Domain\ValueObjects;


abstract class StringOrNullVO
{
    private ?string $value;

    public function __construct(?string $value)
    {
        $this->value = $value;
    }

    public function value(): ?string
    {
        return $this->value;
    }
}
