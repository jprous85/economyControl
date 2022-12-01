<?php

declare(strict_types=1);

namespace Tests\Economy\Domain\Economy\ValueObjects;

use Src\Economy\Domain\Economy\ValueObjects\EconomyEconomicManagementVO;


final class EconomyEconomicManagementVOMother
{
    public static function create(string $value): EconomyEconomicManagementVO
    {
        return new EconomyEconomicManagementVO($value);
    }

    public static function random(): EconomyEconomicManagementVO
    {
        return self::create('def50200e07cb59b907882929cf65517909e7969503bb2bcaf05adb1e2d5f0a74d871aadd96987f833e78654481e5a848f4758bce9fa6c046d8e00103c5329cb703294b74a5ff66b31add571eb26d33d0cb183ad0700491f783d11dc4462faa7b5dfdeab1617f7d3cb2499baa7916c8501aa1a336cb3eb2c5a3c3c6318c8a8d7d0534ce354781f0e7dff05efd613e14c161afa07ed4e834051659236f89b4ae757b200c7085581b1171f5e8d2e97ee3c9f2d67a5da37e2ca6bc6f540fdbdbbe1f2ea7e0dcfc12a6a447dfc9e4ecfc0d1721644e925fce172196a70c63bf5cd2f84aaf269a99d997a786666552a41c58b4e77239f4bbcbcf52b53aab6b46c0d9a003babdd76f185a0cf1abc2d89665e58bff833daf0494ddafb66d06821b5c74bdf3409523ebd74372c189dd72da2c487012d104838b2cc801906908bdc8566904244809b32bab22f275fc8388bb3504a785052542aa13d08d9448a6e37b0f807');
    }
}
