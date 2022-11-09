<?php

declare(strict_types=1);


namespace App\Console\Commands\DDDScript\Infrastructure;


use App\Console\Commands\DDDScript\Domain\DDDUtils;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

final class DatabaseQuestions
{

    public function __construct(private Command $command)
    {
    }

    public function __invoke(string $module_name, ?string $suffix = null): array|null
    {
        $table          = '';
        $data_datatable = [];

        if ($this->command->anticipate('Do you want use some database structure?', ['yes'], 'yes') == 'yes') {

            $databases = $this->getDataBases();

            if (in_array(lcfirst(DDDUtils::convertCamelCaseToUnderscore($module_name . $suffix)), $databases)) {
                $table = lcfirst(DDDUtils::convertCamelCaseToUnderscore($module_name . $suffix));
            }

            $datatable      = $this->command->choice('There are this tables in BBDD, What do you want to use?', $databases, $table);
            $data_datatable = $this->fillDataMapper($datatable);
        }
        return count($data_datatable) > 0 ? $data_datatable : null;
    }

    private function getDataBases(): array
    {
        $except_tables = [
            'domain_events', 'failed_jobs', 'jobs', 'migrations', 'oauth_access_tokens', 'oauth_auth_codes',
            'oauth_clients', 'oauth_personal_access_clients', 'oauth_refresh_tokens'
        ];

        $databases_tables = [];

        $tables = DB::select('SHOW TABLES');

        foreach ($tables as $table) {
            foreach ($table as $key => $value)
                if (!in_array($value, $except_tables)) {
                    array_push($databases_tables, $value);
                }
        }
        return $databases_tables;
    }

    private function fillDataMapper($datatable): array
    {
        $array_data_mapper = [];

        $table = DB::select('describe ' . $datatable);

        foreach ($table as $item) {

            $fill_data_mapper = [
                'name_underscore' => $item->Field,
                'name_camel_case' => DDDUtils::dashesToCamelCase($item->Field),
                'type'            => DDDUtils::getType($item->Type),
                'is_null'         => ($item->Null == 'YES') ? true : null
            ];

            array_push($array_data_mapper, $fill_data_mapper);
        }
        return $array_data_mapper;
    }

}
