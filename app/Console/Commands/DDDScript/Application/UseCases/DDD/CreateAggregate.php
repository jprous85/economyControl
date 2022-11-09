<?php

declare(strict_types=1);


namespace App\Console\Commands\DDDScript\Application\UseCases\DDD;


use App\Console\Commands\DDDScript\Domain\Aggregate;
use App\Console\Commands\DDDScript\Domain\DDDScriptConfig;

final class CreateAggregate
{
    public function __construct()
    {
    }

    public function __invoke(
        string $root_directory,
        string $main_folder,
        string $module_name,
        string $name_of_aggregate
    )
    {

        $aggregate = new Aggregate(
            $root_directory,
            $main_folder,
            $module_name,
            $name_of_aggregate
        );

        (new AggregateSkeletonStructure())($aggregate);

        if (is_dir(DDDScriptConfig::TESTS . DIRECTORY_SEPARATOR . $module_name . DIRECTORY_SEPARATOR . ucfirst(DDDScriptConfig::DOMAIN))) {
            (new AggregateTestSkeletonStructure())($aggregate);
        }
    }
}
