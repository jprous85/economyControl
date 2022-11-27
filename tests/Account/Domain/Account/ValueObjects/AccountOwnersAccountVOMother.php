<?php

declare(strict_types=1);

namespace Tests\Account\Domain\Account\ValueObjects;

use Src\Account\Domain\Account\ValueObjects\AccountOwnersAccountVO;


final class AccountOwnersAccountVOMother
{
    public static function create(string  $value): AccountOwnersAccountVO
    {
        return new AccountOwnersAccountVO($value);
    }

    public static function random(): AccountOwnersAccountVO
    {
        return self::create('[1,2,3,4]');
    }
}
