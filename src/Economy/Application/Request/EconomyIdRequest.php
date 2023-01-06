<?php

declare(strict_types=1);


namespace Src\Economy\Application\Request;


final class EconomyIdRequest
{
    public function __construct(private int $id)
    {
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
}
