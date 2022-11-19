<?php

declare(strict_types=1);

namespace Src\Shared\Domain\ValueObjects;


abstract class FloatVO
{
    private float $value;

    public function __construct(float $value)
    {
        $this->ensureIsNotNull($value);
        $this->value = $value;
    }

    public function value(): float
    {
        return $this->value;
    }

    private function ensureIsNotNull(float $value): void
    {
        if (!isset($value))
            throw new \InvalidArgumentException('This float is null');
    }
}
