<?php

declare(strict_types=1);


namespace App\Console\Commands\DDDScript\Application\UseCases\DDD;


use App\Console\Commands\DDDScript\Domain\DDD;
use App\Console\Commands\DDDScript\Domain\DDDUtils;

final class ReplaceDDDValuesOfFiles
{
    public function __construct(private DDD $ddd)
    {
    }

    public function fileDDDExampleGetContents($directory, $fileName): array|bool|string
    {
        $fileName  = str_replace($this->ddd->getModuleName(), '__ModuleName__', $fileName);
        $directory = str_replace($this->ddd->getModuleName(), '__ModuleName__', $directory);
        $directory = str_replace('DDDExample' . DIRECTORY_SEPARATOR . $directory . $fileName, '__ModuleName__', $directory);
        $file      = file_get_contents('DDDExample' . DIRECTORY_SEPARATOR . $directory . $fileName);
        $file      = str_replace('__ModuleName__', $this->ddd->getModuleName(), $file);
        $file      = str_replace('__BasePath__', ucfirst($this->ddd->getMainFolder()), $file);
        $file      = str_replace('__BaseMinPath__', lcfirst($this->ddd->getMainFolder()), $file);
        $file      = str_replace('__ModuleMinName__', lcfirst($this->ddd->getModuleName()), $file);
        $file      = str_replace('__ModuleMinUnderscoreName__', lcfirst(DDDUtils::convertCamelCaseToUnderscore($this->ddd->getModuleName())), $file);
        $file      = str_replace('__ModuleMinUnderscoreNameWithPlural__', lcfirst(DDDUtils::convertCamelCaseToUnderscore($this->ddd->getModuleName())) . $this->ddd->getSuffix(), $file);
        $file      = str_replace('__ModuleMinCamelCaseNameWithPlural__', lcfirst($this->ddd->getModuleName()) . $this->ddd->getSuffix(), $file);
        return $file;
    }

    public function directoryDDDExampleChangeName($directory): string
    {
        if ($directory == '__ModuleName__') return $this->ddd->getModuleName();
        else return $directory;
    }
}
