<?php

declare(strict_types=1);

namespace Src\User\Domain\User\Event;

use Src\User\Domain\User\User;
use Src\Shared\Domain\Bus\Event\DomainEvent;

class UserUpdateDomainEvent extends DomainEvent
{
    public function __construct(
        private int $id,
        private User $user,
        private string $eventDate
    ) {
        parent::__construct($id, $eventDate);
    }

    public static function eventName(): string
    {
        return 'user.updated';
    }

    public function toPrimitives(): array
    {
        return [];
    }

    public static function fromPrimitives(int $aggregateId, array $body, string $eventId, string $eventDate): DomainEvent
    {
        return new self(
            $aggregateId,
            $body['user'],
            $eventDate
        );
    }
}
