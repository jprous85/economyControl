<?php
declare(strict_types=1);

namespace Tests\Shared\Domain\ValueObjects;

use Src\Shared\Domain\Helpers\DateTimeHelper;
use Src\Shared\Domain\ValueObjects\CreatedAtVO;

final class CreatedAtMother
{
    private static function create(string $value): CreatedAtVO
    {
        return new CreatedAtVO($value);
    }

    public static function today(): CreatedAtVO
    {
        return self::create(DateTimeHelper::nowToString());
    }
}
