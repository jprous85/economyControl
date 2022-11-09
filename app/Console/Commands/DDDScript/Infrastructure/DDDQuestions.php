<?php

declare(strict_types=1);


namespace App\Console\Commands\DDDScript\Infrastructure;


use App\Console\Commands\DDDScript\Application\UseCases\DDD\CreateDDD;
use App\Console\Commands\DDDScript\Application\UseCases\VO\CreateVOFromDDDStructure;
use Illuminate\Console\Command;

final class DDDQuestions extends Command
{

    protected $signature = 'ddd:createDDDModule';


    public function __construct(
        private CreateDDD $create_ddd_structure
    ) {
        parent::__construct();
    }

    public function handle(): int
    {
        $main_folder = (new CommonQuestions($this))();
        list($root_directory, $module_name) = $this->getModuleName($main_folder);
        $suffix    = $this->getSuffix();
        $make_test = $this->anticipate('Do you want to create a Suite Tests for this Module?', ['yes'], 'yes');
        $datatable = (new DatabaseQuestions($this))($module_name, $suffix);

        $vo = [];
        if ($datatable && $this->anticipate('Do you want to create VO\'s with database data?', ['yes'], 'yes') == 'yes') {
            foreach ($datatable as $item) {
                $vo[] = (new CreateVOFromDDDStructure())($module_name, $module_name, $item);
            }
            $this->previewVO($vo);
        }

        $ddd = ($this->create_ddd_structure)(
            $root_directory,
            $main_folder,
            $module_name,
            $suffix,
            $make_test,
            $vo ? $vo : null
        );

        new RelationOfCreatedFiles($this, $ddd);

        return $this::SUCCESS;
    }

    private function getModuleName(string $main_folder): array
    {
        do {
            $exit           = false;
            $module_name    = $this->ask('Write the Module name in singular');
            $root_directory = '';

            if (!in_array($module_name, ['Test', 'Example'])) {

                $root_directory = base_path() . DIRECTORY_SEPARATOR . $main_folder . DIRECTORY_SEPARATOR . $module_name;

                if (!$module_name) {
                    $this->line('Please fill this field!');
                    $exit = true;
                }

                if ($module_name && is_dir($root_directory)) {
                    $this->line('This directory is already exist!');
                    $exit = true;
                }
            } else {
                $this->line('Sorry, this is reserved word, please try another');
            }

        } while ($exit);

        return [$root_directory, ucfirst($module_name)];
    }

    private function getSuffix(): string
    {
        $suffix = $this->choice('How is the Module word in plural?', ['', 's', 'es', 'other'], '');

        if ($suffix == 'other') {
            $suffix = $this->ask('Insert the Module suffix');
        }

        return $suffix;
    }

    private function previewVO(array $vo): void
    {
        if (count($vo) > 0 && $this->anticipate('Would you like preview VO files?', ['yes'], 'yes') == 'yes') {
            foreach ($vo as $item) {
                $this->info($item['vo_name']);
            }
        }
        $this->anticipate('OK, you can continue!', ['press Enter'], 'press Enter');
    }
}
