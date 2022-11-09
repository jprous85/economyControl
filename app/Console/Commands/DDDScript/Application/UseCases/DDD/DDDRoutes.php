<?php


namespace App\Console\Commands\DDDScript\Application\UseCases\DDD;


use App\Console\Commands\DDDScript\Domain\DDD;
use App\Console\Commands\DDDScript\Domain\FilesUtils;


class DDDRoutes
{
    public function __construct(private DDD $ddd)
    {
        $this->createRoutes();
    }

    private function createRoutes()
    {
        $file = file_get_contents('DDDExample' . DIRECTORY_SEPARATOR . 'ExampleRoutes.php');
        $file = str_replace('__ModuleName__', $this->ddd->getModuleName(), $file);
        $file = str_replace('__BasePath__', ucfirst($this->ddd->getMainFolder()), $file);
        FilesUtils::createDirectory('routes/' . $this->ddd->getModuleName());
        FilesUtils::createFile('routes/' . $this->ddd->getModuleName() . '/' . $this->ddd->getModuleName() . '.php', $file);
        $this->insertRoutesInRoutesApplication();
    }

    private function insertRoutesInRoutesApplication()
    {
        $app = file_get_contents('routes/api.php');
        $app = str_replace('// --insert_new_instance_route', "\tRoute::prefix('/" . lcfirst($this->ddd->getModuleName() . $this->ddd->getSuffix()) . "')->middleware(['scope:'])->group(__DIR__.'/" . $this->ddd->getModuleName() . '/' . $this->ddd->getModuleName() . ".php');" . PHP_EOL . "// --insert_new_instance_route", $app);
        file_put_contents('routes/api.php', $app);
    }
}
