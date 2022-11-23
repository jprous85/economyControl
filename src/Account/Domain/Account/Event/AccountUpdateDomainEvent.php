<?php

declare(strict_types=1);

namespace Src\Account\Domain\Account\Event;

use Src\Account\Domain\Account\Account;
use Src\Shared\Domain\Bus\Event\DomainEvent;

class AccountUpdateDomainEvent extends DomainEvent
{
    public function __construct(
        private int $id,
        private Account $account,
        private string $eventDate
    ) {
        parent::__construct($id, $eventDate);
    }

    public static function eventName(): string
    {
        return 'account.updated';
    }

    public function toPrimitives(): array
    {
        return [];
    }

    public static function fromPrimitives(int $aggregateId, array $body, string $eventId, string $eventDate): DomainEvent
    {
        return new self(
            $aggregateId,
            $body['account'],
            $eventDate
        );
    }
}
