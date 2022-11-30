<?php

declare(strict_types=1);


namespace Src\Shared\Infrastructure\CryptoAndDecrypt;

use Defuse\Crypto\Crypto;
use Defuse\Crypto\Key;

final class CryptoAndDecrypt
{
    public static function encrypt(string $value): bool|string
    {
        return Crypto::encrypt($value, Key::loadFromAsciiSafeString(env('SECRET_KEY_DECRIPT')));
    }

    public static function decrypt(string $value): bool|string
    {
        return Crypto::decrypt($value, Key::loadFromAsciiSafeString(env('SECRET_KEY_DECRIPT')));

    }
}
