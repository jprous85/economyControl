<?php

declare(strict_types=1);


namespace App\Console\Commands\DDDScript\Application\UseCases\VO;


use App\Console\Commands\DDDScript\Domain\DDDUtils;
use App\Console\Commands\DDDScript\Domain\VOUtils;

final class CreateVOFromDDDStructure
{

    public function __invoke($module_name, $aggregate_name, $data): array
    {
        $vo_name = VOUtils::checkNameOfVO($aggregate_name, ucfirst($data['name_camel_case']));

        $data['aggregate_name'] = $aggregate_name;
        $data['vo_name']        = $vo_name;
        $data['vo_name_mother'] = $vo_name . 'Mother';
        $data['full_type']      = DDDUtils::getType($data['type'], true);

        return $data;
    }
}
