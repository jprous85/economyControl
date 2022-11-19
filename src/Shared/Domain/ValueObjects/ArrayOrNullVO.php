<?php

declare(strict_types=1);


namespace Src\Shared\Domain\ValueObjects;

abstract class ArrayOrNullVO
{
    private array $value;

    public function __construct(?array $value)
    {
        if (isset($value)){
            $this->ensureIsAnArray($value);
        }
        $this->value = $value;
    }

    private function ensureIsAnArray($value)
    {
        if (!is_array($value))
            throw new \InvalidArgumentException('This is not an array');
    }

    public function value(): ?array
    {
        return $this->value;
    }
}
