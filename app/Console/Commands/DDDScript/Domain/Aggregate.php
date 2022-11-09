<?php

declare(strict_types=1);


namespace App\Console\Commands\DDDScript\Domain;


final class Aggregate
{
    public function __construct(
        private string $root_directory,
        private string $main_folder,
        private string $module_name,
        private string $name_of_aggregate,
    )
    {
    }

    public function getRootDirectory(): string
    {
        return $this->root_directory;
    }

    public function getMainFolder(): string
    {
        return $this->main_folder;
    }

    public function getModuleName(): string
    {
        return $this->module_name;
    }

    public function getNameOfAggregate(): string
    {
        return $this->name_of_aggregate;
    }

}
