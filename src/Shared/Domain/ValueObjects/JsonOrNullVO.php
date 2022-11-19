<?php

declare(strict_types=1);

namespace Src\Shared\Domain\ValueObjects;


use InvalidArgumentException;

abstract class JsonOrNullVO
{
    private ?string $value;

    public function __construct(?string $value = null)
    {
        if ($value) {
            $this->ensureIsValidJSON($value);
        }
        $this->value = $value;
    }

    private function ensureIsValidJSON(string $value)
    {
        json_decode($value);
        if (json_last_error() !== JSON_ERROR_NONE) throw new InvalidArgumentException('This JSON is not valid');
    }

    public function value(): ?string
    {
        return $this->value;
    }
}
