<?php

declare(strict_types=1);


namespace App\Console\Commands\DDDScript\Domain;


final class DDD
{
    public function __construct(
        private string $root_directory,
        private string $main_folder,
        private string $module_name,
        private ?string $suffix,
        private ?string $test,
        private ?array $vo
    ) {
    }

    /**
     * @return string
     */
    public function getRootDirectory(): string
    {
        return $this->root_directory;
    }

    /**
     * @return string
     */
    public function getMainFolder(): string
    {
        return $this->main_folder;
    }

    /**
     * @return string
     */
    public function getModuleName(): string
    {
        return $this->module_name;
    }

    /**
     * @return string
     */
    public function getModuleNameUnderscore(): string
    {
        return DDDUtils::convertCamelCaseToUnderscore($this->module_name);
    }

    /**
     * @return null|string
     */
    public function getSuffix(): ?string
    {
        return $this->suffix;
    }

    /**
     * @return null|array
     */
    public function getVo(): ?array
    {
        return $this->vo;
    }

    /**
     * @return null|string
     */
    public function getTest(): ?string
    {
        return $this->test;
    }

}
