<?php
declare(strict_types=1);

namespace Tests\Shared\Domain\ValueObjects;

use Src\Shared\Domain\Helpers\DateTimeHelper;
use Src\Shared\Domain\ValueObjects\DeletedAtVO;

final class DeletedAtMother
{
    private static function create(string $value): DeletedAtVO
    {
        return new DeletedAtVO($value);
    }

    public static function today(): DeletedAtVO
    {
        return self::create(DateTimeHelper::nowToString());
    }
}
