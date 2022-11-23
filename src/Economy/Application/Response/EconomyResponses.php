<?php

declare(strict_types=1);

namespace Src\Economy\Application\Response;

final class EconomyResponses
{
    private array $economy_responses;

    public function __construct(EconomyResponse ...$economy_responses)
    {
        $this->economy_responses = $economy_responses;
    }

    public function getEconomy(): array
    {
        return $this->economy_responses;
    }

    public function toArray(): array
    {
        $economy_response_array = [];
        foreach ($this->economy_responses as $economy_response)
        {
            $economy_response_array[] = $economy_response->toArray();
        }
        return $economy_response_array;
    }
}
