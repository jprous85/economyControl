<?php

declare(strict_types=1);

namespace __BasePath__\__ModuleName__\Application\Response;


use __BasePath__\__ModuleName__\Domain\__ModuleName__\__ModuleName__;

// -- uses of vo -- //

final class __ModuleName__Response
{
    public function __construct(
// -- parameters of responses -- //
    )
    {
    }

// -- getters -- //

    public function toArray(): array
    {
        return [
// -- data to array with assoc in response -- //
        ];
    }

    public static function responseToEntity(self $response): __ModuleName__
    {
        return new __ModuleName__(
// -- response to entity function in Response -- //
        );
    }

    public static function Self__ModuleName__Response($__ModuleMinUnderscoreName__): self
    {
        return new self(
// -- responses values with vo in self response -- //
        );
    }

}
