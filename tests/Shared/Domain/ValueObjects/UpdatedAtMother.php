<?php
declare(strict_types=1);

namespace Tests\Shared\Domain\ValueObjects;

use Src\Shared\Domain\Helpers\DateTimeHelper;
use Src\Shared\Domain\ValueObjects\UpdatedAtVO;

final class UpdatedAtMother
{
    private static function create(string $value): UpdatedAtVO
    {
        return new UpdatedAtVO($value);
    }

    public static function today(): UpdatedAtVO
    {
        return self::create(DateTimeHelper::nowToString());
    }
}
