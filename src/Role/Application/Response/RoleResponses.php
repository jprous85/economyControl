<?php

declare(strict_types=1);

namespace Src\Role\Application\Response;

final class RoleResponses
{
    private array $role_responses;

    public function __construct(RoleResponse ...$role_responses)
    {
        $this->role_responses = $role_responses;
    }

    public function getRole(): array
    {
        return $this->role_responses;
    }

    public function toArray(): array
    {
        $role_response_array = [];
        foreach ($this->role_responses as $role_response)
        {
            $role_response_array[] = $role_response->toArray();
        }
        return $role_response_array;
    }
}
