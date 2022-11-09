<?php

declare(strict_types=1);


namespace App\Console\Commands\DDDScript\Infrastructure;


use App\Console\Commands\DDDScript\Application\UseCases\VO\CreateVO;
use App\Console\Commands\DDDScript\Domain\DDDScriptConfig;
use App\Console\Commands\DDDScript\Domain\DDDUtils;
use App\Console\Commands\DDDScript\Domain\VOUtils;
use Illuminate\Console\Command;

final class VOQuestions extends Command
{

    protected $signature = 'ddd:createVO';


    public function __construct(
        private CreateVO $create_vo
    ) {
        parent::__construct();
    }

    public function __invoke()
    {
        $main_folder = (new CommonQuestions($this))();

        $all_modules = DDDUtils::getFoldersOfDirectory($main_folder);
        $module_name = $this->choice('Choice the Module to create a new VO (Value Object)', $all_modules);
        $aggregate_name = $module_name;

        $aggregates = DDDUtils::getDirectories($main_folder. DIRECTORY_SEPARATOR . $aggregate_name . DIRECTORY_SEPARATOR . DDDScriptConfig::DOMAIN);

        if (count($aggregates) == 1) {
            $aggregate_name = $aggregates[0];
        } else  {
            $aggregate_name = $this->choice('Choice the aggregate (Aggregates)', $aggregates);
        }

        $vo_collection = self::createVOsCollection($this, $main_folder, $module_name, $aggregate_name);

        ($this->create_vo)($vo_collection);

        $this->info('Thanks for use this magical Jordi\'s module, remember to check the ValueObjects in folder Domain and in Suite Tests folder, if his module have any Tests.');
        $this->info('I hope that you have a nice day.');
    }

    public static function createVOsCollection(Command $command, string $main_folder, string $module_name, string $aggregate_name): array
    {
        $vo_collection = [];
        $inheritance   = null;

        do {
            $vo_name = ucfirst($command->ask('VO Name (write "exit" for leaving)'));

            if (strtoupper($vo_name) != 'EXIT') {

                $vo_name = VOUtils::checkNameOfVO($aggregate_name, $vo_name);

                $sharedValueObjectsFolder = VOUtils::directorySharedValueObjectsFolder($main_folder);

                if (is_dir($sharedValueObjectsFolder) && count(DDDUtils::getFoldersOfDirectory($sharedValueObjectsFolder)) > 0) {

                    $primitiveFields = DDDUtils::getFoldersOfDirectory($sharedValueObjectsFolder, true, true);
                    $inheritance     = $command->choice('It this VO inheritance of other primitive VO?', $primitiveFields, '');

                }

                array_push($vo_collection, [
                    'main_folder'    => $main_folder,
                    'module_name'    => $module_name,
                    'aggregate_name' => $aggregate_name,
                    'vo_name'        => $vo_name,
                    'vo_name_mother' => $vo_name . 'Mother',
                    'inheritance'    => $inheritance
                ]);

            }

        } while (strtoupper($vo_name) != 'EXIT');

        return $vo_collection;
    }


}
