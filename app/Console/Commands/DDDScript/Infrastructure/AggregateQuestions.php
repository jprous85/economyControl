<?php

declare(strict_types=1);


namespace App\Console\Commands\DDDScript\Infrastructure;


use App\Console\Commands\DDDScript\Application\UseCases\DDD\CreateAggregate;
use App\Console\Commands\DDDScript\Application\UseCases\VO\CreateVO;
use App\Console\Commands\DDDScript\Application\UseCases\VO\CreateVOFromDDDStructure;
use App\Console\Commands\DDDScript\Domain\DDDUtils;
use App\Console\Commands\DDDScript\Domain\VOUtils;
use Illuminate\Console\Command;

final class AggregateQuestions extends Command
{
    protected $signature = 'ddd:createAggregate';

    public function __construct(
        private CreateAggregate $create_aggregate,
        private CreateVO $create_vo
    ) {
        parent::__construct();
    }

    public function __invoke()
    {
        $main_folder = (new CommonQuestions($this))();

        $all_modules = DDDUtils::getFoldersOfDirectory($main_folder);
        $module_name = $this->choice('Choice the Module to create a new aggregate (Aggregate)', $all_modules);

        $root_directory = base_path() . DIRECTORY_SEPARATOR . $main_folder . DIRECTORY_SEPARATOR . $module_name;

        $name_of_aggregate = $this->ask('Witch is aggregate name\'s');

        ($this->create_aggregate)(
            $root_directory,
            $main_folder,
            $module_name,
            $name_of_aggregate
        );

        if ($this->anticipate('Do you want you want create ValueObjects for this Aggregate?', ['yes'], 'yes') == 'yes') {
            $vo_collection = $this->createAggregateVOs($main_folder, $module_name, $name_of_aggregate);
            ($this->create_vo)($vo_collection);
        }

        $this->info('Aggregate create successfully');
    }

    private function createAggregateVOs($main_folder, $module_name, $aggregate_name): array
    {
        return VOQuestions::createVOsCollection($this, $main_folder, $module_name, $aggregate_name);
    }


}
