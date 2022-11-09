<?php

declare(strict_types=1);


namespace App\Console\Commands\DDDScript\Domain;


final class VOUtils
{
    public static function checkNameOfVO(string $module_name, string $name_of_vo): string
    {
        if (strtoupper(substr($name_of_vo, 0, strlen($module_name))) != strtoupper($module_name)) {
            $name_of_vo = $module_name . $name_of_vo;
        }

        if (strtoupper(substr($name_of_vo, -2)) != 'VO') {
            $name_of_vo .= 'VO';
        }

        return $name_of_vo;
    }

    public static function directorySharedValueObjectsFolder(string $main_folder): string
    {
        return $main_folder . DIRECTORY_SEPARATOR . 'Shared' . DIRECTORY_SEPARATOR . 'Domain' . DIRECTORY_SEPARATOR . 'ValueObjects';
    }
}
