<?php

declare(strict_types=1);

namespace __BasePath__\__ModuleName__\Domain\__ModuleName__\Event;

use __BasePath__\__ModuleName__\Domain\__ModuleName__\__ModuleName__;
use Src\Shared\Domain\Bus\Event\DomainEvent;

class __ModuleName__UpdateDomainEvent extends DomainEvent
{
    public function __construct(
        private int $id,
        private __ModuleName__ $__ModuleMinUnderscoreName__,
        private string $eventDate
    ) {
        parent::__construct($id, $eventDate);
    }

    public static function eventName(): string
    {
        return '__ModuleMinUnderscoreName__.updated';
    }

    public function toPrimitives(): array
    {
        return [];
    }

    public static function fromPrimitives(int $aggregateId, array $body, string $eventId, string $eventDate): DomainEvent
    {
        return new self(
            $aggregateId,
            $body['__ModuleMinUnderscoreName__'],
            $eventDate
        );
    }
}
