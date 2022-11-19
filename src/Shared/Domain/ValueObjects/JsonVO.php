<?php

declare(strict_types=1);

namespace Src\Shared\Domain\ValueObjects;


use InvalidArgumentException;

abstract class JsonVO extends JsonOrNullVO
{
    public function __construct(string $value)
    {
        $this->ensureIsNotNull($value);
        parent::__construct($value);
    }

    private function ensureIsNotNull(string $value)
    {
        if (!isset($value))
            throw new InvalidArgumentException('This JSON is null');
    }
}
