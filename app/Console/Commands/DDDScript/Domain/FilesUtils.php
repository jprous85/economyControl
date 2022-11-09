<?php

declare(strict_types=1);


namespace App\Console\Commands\DDDScript\Domain;


final class FilesUtils
{
    public static function createDirectory($directory)
    {
        if (!is_dir($directory)) {
            mkdir($directory);
        }
    }

    public static function createFile($file, $content)
    {
        touch($file);
        file_put_contents($file, $content);
    }
}
