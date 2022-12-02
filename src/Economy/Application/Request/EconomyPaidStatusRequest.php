<?php

declare(strict_types=1);


namespace Src\Economy\Application\Request;


final class EconomyPaidStatusRequest
{

    public function __construct(private string $uuid, private bool $status)
    {
    }

    /**
     * @return string
     */
    public function getUuid(): string
    {
        return $this->uuid;
    }

    /**
     * @return string
     */
    public function getStatus(): bool
    {
        return $this->status;
    }

}
