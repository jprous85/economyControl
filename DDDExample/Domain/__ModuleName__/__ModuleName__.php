<?php

declare(strict_types = 1);

namespace __BasePath__\__ModuleName__\Domain\__ModuleName__;

use __BasePath__\__ModuleName__\Domain\__ModuleName__\Event\__ModuleName__CreateDomainEvent;
use __BasePath__\__ModuleName__\Domain\__ModuleName__\Event\__ModuleName__UpdateDomainEvent;
use Src\Shared\Domain\Aggregate\AggregateRoot;

// -- uses of vo -- //

final class __ModuleName__ extends AggregateRoot
{
    public function __construct(
// -- parameters of entities -- //
    )
    {}

    public static function create(
// -- parameters of entities functions -- //
    ): __ModuleName__
    {
        $__ModuleMinUnderscoreName__ =  new self(
// -- create entity parameters in create function -- //
        );

        $__ModuleMinUnderscoreName__->addEvent(
            new __ModuleName__CreateDomainEvent(
                null,
                $__ModuleMinUnderscoreName__,
                $__ModuleMinUnderscoreName__->getCreatedAt()->value()
            )
        );

        return $__ModuleMinUnderscoreName__;
    }

    public function update(
// -- parameters of entities functions -- //
    ): void
    {
// -- Entities update function assignment values from parameters -- //
        $this->addEvent(
            new __ModuleName__UpdateDomainEvent(
                $this->id->value(),
                $this,
                $this->updated_at->value()
            )
        );
    }

    public function getPrimitives(): array
    {
        return [
// -- get primitives to array in entities-- //
        ];
    }

    /**
     * Getters
     */
// -- getters with vo in entities -- //
}
