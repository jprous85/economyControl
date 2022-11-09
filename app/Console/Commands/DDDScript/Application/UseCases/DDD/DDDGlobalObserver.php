<?php

declare(strict_types=1);


namespace App\Console\Commands\DDDScript\Application\UseCases\DDD;


use App\Console\Commands\DDDScript\Domain\DDD;

final class DDDGlobalObserver
{
    public function __construct(private DDD $ddd)
    {
        $this->includeGlobalObserver();
    }

    private function includeGlobalObserver()
    {
        $file = file_get_contents('app/Providers/EventServiceProvider.php');


        $file = str_replace('__ModuleName__', $this->ddd->getModuleName(), $file);
        $file = str_replace('__BasePath__', ucfirst($this->ddd->getMainFolder()), $file);

        $file = str_replace(
            '// -- use object model -- //',
            'use ' . ucfirst($this->ddd->getMainFolder()) . '\\' . $this->ddd->getModuleName() . '\Infrastructure\Persistence\ORM\\' . $this->ddd->getModuleName() . 'ORMModel;' . PHP_EOL . '// -- use object model -- //',
            $file
        );

        $file = str_replace(
            '// -- instance object model -- //',
            "\t\t\t" . $this->ddd->getModuleName() . 'ORMModel::observe(GlobalObserver::class);'. PHP_EOL . '// -- instance object model -- //',
            $file
        );

        file_put_contents('app/Providers/EventServiceProvider.php', $file);
    }
}
