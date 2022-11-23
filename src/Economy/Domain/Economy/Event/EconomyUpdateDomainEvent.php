<?php

declare(strict_types=1);

namespace Src\Economy\Domain\Economy\Event;

use Src\Economy\Domain\Economy\Economy;
use Src\Shared\Domain\Bus\Event\DomainEvent;

class EconomyUpdateDomainEvent extends DomainEvent
{
    public function __construct(
        private int $id,
        private Economy $economy,
        private string $eventDate
    ) {
        parent::__construct($id, $eventDate);
    }

    public static function eventName(): string
    {
        return 'economy.updated';
    }

    public function toPrimitives(): array
    {
        return [];
    }

    public static function fromPrimitives(int $aggregateId, array $body, string $eventId, string $eventDate): DomainEvent
    {
        return new self(
            $aggregateId,
            $body['economy'],
            $eventDate
        );
    }
}
