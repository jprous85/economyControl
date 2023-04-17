<?php

declare(strict_types=1);


namespace Src\Shared\Infrastructure\CommonFunctions;


final class CommonFunctions
{
    /**
     * @throws \Exception
     */
    public static function generateRandomString($length = 10): string {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%&()=?+/^*,;.:-_<>';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
