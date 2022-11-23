<?php

declare(strict_types=1);

namespace Src\Account\Application\Response;

final class AccountResponses
{
    private array $account_responses;

    public function __construct(AccountResponse ...$account_responses)
    {
        $this->account_responses = $account_responses;
    }

    public function getAccount(): array
    {
        return $this->account_responses;
    }

    public function toArray(): array
    {
        $account_response_array = [];
        foreach ($this->account_responses as $account_response)
        {
            $account_response_array[] = $account_response->toArray();
        }
        return $account_response_array;
    }
}
