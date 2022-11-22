<?php

declare(strict_types=1);

namespace Tests\User\Domain\User\ValueObjects;

use Src\User\Domain\User\ValueObjects\UserApiKeyVO;
use Faker\Factory;


final class UserApiKeyVOMother
{
    public static function create(string  $value): UserApiKeyVO
    {
        return new UserApiKeyVO($value);
    }

    public static function random(): UserApiKeyVO
    {
        $faker = Factory::create();
        return self::create('apikey');
    }
}
