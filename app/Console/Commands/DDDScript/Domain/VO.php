<?php

declare(strict_types=1);


namespace App\Console\Commands\DDDScript\Domain;


final class VO
{
    public function __construct(
        private string $main_folder,
        private string $module_name,
        private string $aggregate_name,
        private string $vo_name,
        private string $vo_name_mother,
        private string $inheritance
    ) {
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
    public function getAggregateName(): string
    {
        return $this->aggregate_name;
    }


    /**
     * @return string
     */
    public function getVoName(): string
    {
        return $this->vo_name;
    }

    /**
     * @return string
     */
    public function getVoNameMother(): string
    {
        return $this->vo_name_mother;
    }

    /**
     * @return string
     */
    public function getInheritance(): string
    {
        return $this->inheritance;
    }


}
