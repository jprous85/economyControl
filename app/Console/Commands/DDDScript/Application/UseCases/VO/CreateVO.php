<?php

declare(strict_types=1);


namespace App\Console\Commands\DDDScript\Application\UseCases\VO;


use App\Console\Commands\DDDScript\Domain\VO;

final class CreateVO
{
    public function __invoke(
        $vo_collection
    ): array
    {

        $vo_array = [];

        foreach ($vo_collection as $vo_item) {
            $vo = new VO(
                $vo_item['main_folder'],
                $vo_item['module_name'],
                $vo_item['aggregate_name'],
                $vo_item['vo_name'],
                $vo_item['vo_name_mother'],
                $vo_item['inheritance'],
            );

            array_push($vo_array, $vo);

            new VOSkeletonStructure($vo);

            if (is_dir('tests' . DIRECTORY_SEPARATOR . $vo->getModuleName() . DIRECTORY_SEPARATOR . 'Domain' . DIRECTORY_SEPARATOR . $vo->getAggregateName() . DIRECTORY_SEPARATOR . 'ValueObjects')) {
                new VOTestSkeletonStructure($vo);
            }
        }

        return $vo_array;
    }
}
