<?php

declare(strict_types=1);


namespace App\Console\Commands\DDDScript\Application\UseCases\DDD;


use App\Console\Commands\DDDScript\Domain\Aggregate;
use App\Console\Commands\DDDScript\Domain\DDDScriptConfig;
use App\Console\Commands\DDDScript\Domain\DDDUtils;
use App\Console\Commands\DDDScript\Domain\FilesUtils;

final class AggregateSkeletonStructure
{
    public function __construct()
    {
    }

    public function __invoke(Aggregate $aggregate)
    {
        $aggregate_directory = base_path() .
                               DIRECTORY_SEPARATOR .
                               $aggregate->getMainFolder() .
                               DIRECTORY_SEPARATOR .
                               $aggregate->getModuleName() .
                               DIRECTORY_SEPARATOR .
                               ucfirst(DDDScriptConfig::DOMAIN) .
                               DIRECTORY_SEPARATOR .
                               ucfirst($aggregate->getNameOfAggregate());

        FilesUtils::createDirectory($aggregate_directory);
        FilesUtils::createDirectory($aggregate_directory . DIRECTORY_SEPARATOR . ucfirst(DDDScriptConfig::VALUE_OBJECTS));


        $file = file_get_contents('DDDExample/Aggregates/Aggregate.php');
        $file = str_replace('__BasePath__', ucfirst($aggregate->getMainFolder()), $file);
        $file = str_replace('__ModuleName__', $aggregate->getModuleName(), $file);
        $file = str_replace('__ModuleName_Aggregate__', $aggregate->getNameOfAggregate(), $file);
        FilesUtils::createFile($aggregate_directory .
                               DIRECTORY_SEPARATOR .
                               ucfirst($aggregate->getNameOfAggregate()) . DDDScriptConfig::DOT_PHP,
                               $file);
    }
}
