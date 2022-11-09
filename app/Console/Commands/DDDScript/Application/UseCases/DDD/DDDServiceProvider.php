<?php


namespace App\Console\Commands\DDDScript\Application\UseCases\DDD;


use App\Console\Commands\DDDScript\Domain\DDD;
use App\Console\Commands\DDDScript\Domain\FilesUtils;

class DDDServiceProvider
{
    public function __construct(private DDD $ddd)
    {
        $this->createServiceProvider();
    }

    private function createServiceProvider()
    {
        $file = file_get_contents('DDDExample' . DIRECTORY_SEPARATOR . 'ExampleServiceProvider.php');
        $file = str_replace('__ModuleName__', $this->ddd->getModuleName(), $file);
        $file = str_replace('__BasePath__', ucfirst($this->ddd->getMainFolder()), $file);
        if (!file_exists('app/Providers/' . $this->ddd->getModuleName() . 'ServiceProvider.php')) {
            FilesUtils::createFile('app/Providers/' . $this->ddd->getModuleName() . 'ServiceProvider.php', $file);
            $this->insertServiceProviderInAppApplication();
        }
    }

    private function insertServiceProviderInAppApplication()
    {
        $app = file_get_contents('config/app.php');
        $app = str_replace('// --insert_new_instance_service_provider', 'App\Providers\\' . $this->ddd->getModuleName() . 'ServiceProvider::class,' . PHP_EOL . "\t\t// --insert_new_instance_service_provider", $app);
        file_put_contents('config/app.php', $app);
    }
}
