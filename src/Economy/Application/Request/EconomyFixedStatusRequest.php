<?php

declare(strict_types=1);


namespace Src\Economy\Application\Request;


final class EconomyFixedStatusRequest
{

    public function __construct(private string $uuid, private string $field, private bool $fixed)
    {
    }

    /**
     * @return string
     */
    public function getUuid(): string
    {
        return $this->uuid;
    }

    public function getField(): string
    {
        return $this->field;
    }

    /**
     * @return string
     */
    public function getFixed(): bool
    {
        return $this->fixed;
    }


}
