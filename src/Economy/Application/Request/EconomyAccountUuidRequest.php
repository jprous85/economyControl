<?php

declare(strict_types=1);


namespace Src\Economy\Application\Request;


final class EconomyAccountUuidRequest
{
    public function __construct(private string $uuid)
    {
    }

    /**
     * @return string
     */
    public function getUuid(): string
    {
        return $this->uuid;
    }
}
