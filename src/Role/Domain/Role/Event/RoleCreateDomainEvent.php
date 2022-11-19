<?php

declare(strict_types=1);

namespace Src\Role\Domain\Role\Event;

use Src\Role\Domain\Role\Role;
use Src\Shared\Domain\Bus\Event\DomainEvent;

class RoleCreateDomainEvent extends DomainEvent
{
    public function __construct(
        private ?int $id,
        private Role $role,
        private string $eventDate
    ) {
        parent::__construct($id, $eventDate);
    }

    public static function eventName(): string
    {
        return 'role.created';
    }

    public function toPrimitives(): array
    {
        return [];
    }

    public static function fromPrimitives(int $aggregateId, array $body, string $eventId, string $eventDate): DomainEvent
    {
        return new self(
            $aggregateId,
            $body['role'],
            $eventDate);
    }
}
