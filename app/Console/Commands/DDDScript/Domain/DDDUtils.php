<?php

declare(strict_types=1);


namespace App\Console\Commands\DDDScript\Domain;


final class DDDUtils
{
    public static function clean()
    {
        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            system('cls');
        } else {
            system('clear');
        }
    }

    public static function convertCamelCaseToUnderscore($input): string
    {
        return strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $input));
    }

    public static function getType(string $type, bool $full = false): string
    {
        if (str_contains(strtolower($type), 'string')) {
            return (!$full) ? 'string' : 'String';
        }

        if (str_contains(strtolower($type), 'int')) {
            return (!$full) ? 'int' : 'Integer';
        }

        if (str_contains(strtolower($type), 'boolean')) {
            return (!$full) ? 'bool' : 'Boolean';
        }

        if (str_contains(strtolower($type), 'decimal')) {
            return (!$full) ? 'float' : 'Decimal';
        }

        if (str_contains(strtolower($type), 'float')) {
            return (!$full) ? 'decimal' : 'Decimal';
        }

        if (str_contains(strtolower($type), 'json')) {
            return (!$full) ? 'json' : 'Json';
        }

        return 'string';
    }



    public static function dashesToCamelCase($string, $capitalizeFirstCharacter = false): array|string
    {
        $str = str_replace(' ', '', ucwords(str_replace('_', ' ', $string)));
        if (!$capitalizeFirstCharacter) {
            $str[0] = strtolower($str[0]);
        }
        return $str;
    }

    public static function getFoldersOfDirectory($directory, $deletePHP = false, $default = false): array
    {
        $allModules = scandir($directory);

        $allReturnModules = $default ? [
            ''
        ] : [];

        foreach ($allModules as $key => $value) {

            if ($deletePHP) {
                $allModules[$key] = str_replace('.php', '', $allModules[$key]);
            }

            if ($value == "." || $value == "..") {
                unset($allModules[$key]);
            } else {
                array_push($allReturnModules, $allModules[$key]);
            }
        }
        sort($allModules);

        return $allReturnModules;
    }

    public static function getDirectories(string $path) : array
    {
        $directories = [];
        $items = scandir($path);
        foreach ($items as $item) {
            if($item == '..' || $item == '.')
                continue;
            if(is_dir($path.'/'.$item))
                $directories[] = $item;
        }
        return $directories;
    }

}
