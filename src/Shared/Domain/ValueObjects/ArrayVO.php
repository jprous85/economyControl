<?php

declare(strict_types=1);


namespace Src\Shared\Domain\ValueObjects;

abstract class ArrayVO
{
    private array $value;

    public function __construct($value)
    {
        $this->ensureIsNotNull($value);
        $this->ensureIsAnArray($value);
        $this->value = $value;
    }

    private function ensureIsNotNull($value)
    {
        if (!isset($value))
            throw new \InvalidArgumentException('This array is null');
    }

    private function ensureIsAnArray($value)
    {
        if (!is_array($value))
            throw new \InvalidArgumentException('This is not an array');
    }

    public function value(): array
    {
        return $this->value;
    }
}
