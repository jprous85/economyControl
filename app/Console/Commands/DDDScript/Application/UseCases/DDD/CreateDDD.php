<?php

declare(strict_types=1);


namespace App\Console\Commands\DDDScript\Application\UseCases\DDD;

use App\Console\Commands\DDDScript\Application\UseCases\VO\VOSkeletonStructure;
use App\Console\Commands\DDDScript\Application\UseCases\VO\VOTestSkeletonStructure;
use App\Console\Commands\DDDScript\Domain\DDD;
use App\Console\Commands\DDDScript\Domain\VO;

final class CreateDDD
{
    public function __invoke(
        $root_directory,
        $main_folder,
        $module_name,
        $suffix,
        $test,
        $vo
    ): DDD {
        $ddd = new DDD(
            $root_directory,
            $main_folder,
            $module_name,
            $suffix,
            $test,
            $vo
        );

        new DDDSkeletonStructure($ddd);

        if ($test == 'yes') {
            new DDDTestSkeletonStructure($ddd);
        }

        if ($vo) {
            foreach ($vo as $vo_item) {
                $vo = new VO(
                    $main_folder,
                    $module_name,
                    $module_name,
                    $vo_item['vo_name'],
                    $vo_item['vo_name_mother'],
                    $vo_item['full_type'] . (($vo_item['is_null'] ? 'OrNull' : '')) . 'VO',
                );

                new VOSkeletonStructure($vo);

                if (is_dir('tests' . DIRECTORY_SEPARATOR . $vo->getModuleName() . DIRECTORY_SEPARATOR . 'Domain' . DIRECTORY_SEPARATOR . $vo->getModuleName() . DIRECTORY_SEPARATOR . 'ValueObjects')) {
                    new VOTestSkeletonStructure($vo);
                }
            }
        }

        new ReplaceValues($ddd);

        //new DDDGlobalObserver($ddd);
        new DDDServiceProvider($ddd);
        new DDDRoutes($ddd);

        return $ddd;
    }
}
