<?php

declare(strict_types=1);


namespace App\Console\Commands\DDDScript\Application\UseCases\DDD;


use App\Console\Commands\DDDScript\Domain\DDD;
use App\Console\Commands\DDDScript\Domain\FilesUtils;

final class DDDSkeletonStructure
{
    private ReplaceDDDValuesOfFiles $replace_ddd_values;

    public function __construct(private DDD $ddd, bool $execute = true)
    {
        if ($execute) {
            $this->replace_ddd_values = new ReplaceDDDValuesOfFiles($this->ddd);
            $this->createStructure();
        }
    }

    private function createStructure()
    {
        $directories = $this->getStructure($this->ddd->getModuleName());

        FilesUtils::createDirectory($this->ddd->getRootDirectory());
        $this->createFolderStructure($this->ddd->getRootDirectory(), $directories);
    }

    private function createFolderStructure($directoryOfModule, $directories)
    {
        foreach ($directories as $main => $mainDirectory) {

            // INFRASTRUCTURE, APPLICATION, DOMAIN Folders

            FilesUtils::createDirectory($directoryOfModule . DIRECTORY_SEPARATOR . $main);
            foreach ($mainDirectory as $mainFolder => $directory) {

                // INFRASTRUCTURE: (CONTROLLERS, PERSISTENCE)
                // APPLICATION: (REQUEST, RESPONSE, USE CASES)
                // DOMAIN: (MODULE NAME FOLDER)

                if (is_array($directory)) {
                    $mainFolder = $this->replace_ddd_values->directoryDDDExampleChangeName($mainFolder);
                    FilesUtils::createDirectory($directoryOfModule . DIRECTORY_SEPARATOR . $main . DIRECTORY_SEPARATOR . $mainFolder);
                    foreach ($directory as $subFolder => $fileOrDirectory) {

                        // INFRASTRUCTURE - PERSISTENCE: (ORM, FILES)
                        // APPLICATION: (FILES)
                        // DOMAIN: (EVENT, REPOSITORIES FOLDERS)

                        if (!is_array($fileOrDirectory) && str_contains($fileOrDirectory, '.php')) {
                            $content = $this->replace_ddd_values->fileDDDExampleGetContents($main . DIRECTORY_SEPARATOR . $mainFolder . DIRECTORY_SEPARATOR, $fileOrDirectory);
                            FilesUtils::createFile($directoryOfModule . DIRECTORY_SEPARATOR . $main . DIRECTORY_SEPARATOR . $mainFolder . DIRECTORY_SEPARATOR . $fileOrDirectory, $content);
                        }
                        else if (!is_array($fileOrDirectory) && !str_contains($fileOrDirectory, '.php')) {
                            $directory_name = $this->replace_ddd_values->directoryDDDExampleChangeName($fileOrDirectory);
                            FilesUtils::createDirectory($directoryOfModule . DIRECTORY_SEPARATOR . $main . DIRECTORY_SEPARATOR . $mainFolder . DIRECTORY_SEPARATOR . $directory_name);
                        }
                        else {
                            $directory_name = $this->replace_ddd_values->directoryDDDExampleChangeName($subFolder);
                            FilesUtils::createDirectory($directoryOfModule . DIRECTORY_SEPARATOR . $main . DIRECTORY_SEPARATOR . $mainFolder . DIRECTORY_SEPARATOR . $directory_name);
                            foreach ($fileOrDirectory as $subFile) {

                                // INFRASTRUCTURE - PERSISTENCE: (FILES)
                                // DOMAIN: (FILES)

                                $content = $this->replace_ddd_values->fileDDDExampleGetContents($main . DIRECTORY_SEPARATOR . $mainFolder . DIRECTORY_SEPARATOR . $subFolder . DIRECTORY_SEPARATOR, $subFile);
                                FilesUtils::createFile($directoryOfModule . DIRECTORY_SEPARATOR . $main . DIRECTORY_SEPARATOR . $mainFolder . DIRECTORY_SEPARATOR . $subFolder . DIRECTORY_SEPARATOR . $subFile, $content);
                            }
                        }
                    }
                }
            }
        }
    }

    public function getStructure($moduleName): array
    {
        return [
            'Application'    => [
                'Request'  => [
                    'Show' . ucfirst($moduleName) . 'Request.php',
                    'Create' . ucfirst($moduleName) . 'Request.php',
                    'Update' . ucfirst($moduleName) . 'Request.php',
                    'Delete' . ucfirst($moduleName) . 'Request.php',
                ],
                'Response' => [
                    ucfirst($moduleName) . 'Response.php',
                    ucfirst($moduleName) . 'Responses.php'
                ],
                'UseCases' => [
                    'Show' . ucfirst($moduleName) . '.php',
                    'ShowAll' . ucfirst($moduleName) . '.php',
                    'Create' . ucfirst($moduleName) . '.php',
                    'Update' . ucfirst($moduleName) . '.php',
                    'Delete' . ucfirst($moduleName) . '.php'
                ]
            ],
            'Infrastructure' => [
                'Controllers' => [
                    ucfirst($moduleName) . 'GetController' . '.php',
                    ucfirst($moduleName) . 'PostController' . '.php',
                    ucfirst($moduleName) . 'PutController' . '.php',
                    ucfirst($moduleName) . 'DeleteController' . '.php'
                ],
                'Persistence' => [
                    'ORM' => [
                        ucfirst($moduleName) . 'MYSQLRepository.php',
                        ucfirst($moduleName) . 'ORMModel.php'
                    ]
                ]
            ],
            'Domain'         => [
                ucfirst($moduleName) => [
                    'Event'        => [
                        ucfirst($moduleName) . 'CreateDomainEvent.php',
                        ucfirst($moduleName) . 'UpdateDomainEvent.php'
                    ],
                    'Repositories' => [
                        ucfirst($moduleName) . 'Repository.php',
                    ],
                    'ValueObjects',
                    ucfirst($moduleName) . '.php',
                    ucfirst($moduleName) . 'NotExist.php'
                ]
            ]
        ];
    }
}
