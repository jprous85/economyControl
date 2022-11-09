<?php

declare(strict_types=1);


namespace App\Console\Commands\DDDScript\Application\UseCases\DDD;


use App\Console\Commands\DDDScript\Domain\DDD;
use App\Console\Commands\DDDScript\Domain\FilesUtils;

final class DDDTestSkeletonStructure
{
    private ReplaceDDDValuesOfFiles $replace;

    public function __construct(private DDD $ddd, bool $execute = true)
    {
        if ($execute)
        {
            $this->replace = new ReplaceDDDValuesOfFiles($this->ddd);
            $this->createTest();
        }
    }

    private function createTest()
    {
        $structure = $this->getTestStructure($this->ddd->getModuleName());
        $this->createFolderTestStructure($structure);
        $this->insertTestInPhpUnitApplication();
    }

    private function createFolderTestStructure($structure)
    {
        $baseFolder = base_path() . DIRECTORY_SEPARATOR . 'tests' . DIRECTORY_SEPARATOR . ucfirst($this->ddd->getModuleName());
        FilesUtils::createDirectory($baseFolder);

        foreach ($structure as $main => $mainDirectory) {

            // INFRASTRUCTURE, APPLICATION, DOMAIN Folders

            $main = $this->replace->directoryDDDExampleChangeName($main);
            FilesUtils::createDirectory($baseFolder . DIRECTORY_SEPARATOR . $main);
            if (is_array($mainDirectory)) {
                foreach ($mainDirectory as $directory => $mainFolder) {

                    // INFRASTRUCTURE: (REQUEST FOLDER, ACCEPTED TEST FILES)
                    // APPLICATION: (REQUEST FOLDER, UNIT TEST FILES)
                    // DOMAIN: (MODULE NAME FOLDER)

                    if (is_array($mainFolder)) {
                        $directory = $this->replace->directoryDDDExampleChangeName($directory);
                        FilesUtils::createDirectory($baseFolder . DIRECTORY_SEPARATOR . $main . DIRECTORY_SEPARATOR . $directory);
                        foreach ($mainFolder as $mainFile => $file) {

                            if (str_contains($file, '.php')) {
                                $content = $this->replace->fileDDDExampleGetContents('Test' . DIRECTORY_SEPARATOR . $main . DIRECTORY_SEPARATOR . $directory . DIRECTORY_SEPARATOR, $file);
                                FilesUtils::createFile($baseFolder . DIRECTORY_SEPARATOR . $main . DIRECTORY_SEPARATOR . $directory . DIRECTORY_SEPARATOR . $file, $content);
                            } else {
                                $mainFile = $this->replace->directoryDDDExampleChangeName($file);
                                FilesUtils::createDirectory($baseFolder . DIRECTORY_SEPARATOR . $main . DIRECTORY_SEPARATOR . $directory . DIRECTORY_SEPARATOR . $file);
                            }
                        }
                    } else {
                        if (str_contains($mainFolder, '.php')) {
                            $content = $this->replace->fileDDDExampleGetContents('Test' . DIRECTORY_SEPARATOR . $main . DIRECTORY_SEPARATOR, $mainFolder);
                            FilesUtils::createFile($baseFolder . DIRECTORY_SEPARATOR . $main . DIRECTORY_SEPARATOR . $mainFolder, $content);
                        } else {
                            $mainFolder = $this->replace->directoryDDDExampleChangeName($mainFolder);
                            FilesUtils::createDirectory($baseFolder . DIRECTORY_SEPARATOR . $main . DIRECTORY_SEPARATOR . $mainFolder);
                        }
                    }
                }
            }
        }
    }

    public function getTestStructure($moduleName): array
    {
        return [
            'Application'    => [
                'Request' => [
                    'Show' . ucfirst($moduleName) . 'RequestMother.php',
                    'Create' . ucfirst($moduleName) . 'RequestMother.php',
                    'Update' . ucfirst($moduleName) . 'RequestMother.php',
                    'Delete' . ucfirst($moduleName) . 'RequestMother.php'
                ],
                ucfirst($moduleName) . 'UnitTestCase.php',
                'Show' . ucfirst($moduleName) . 'UnitTest.php',
                'ShowAll' . ucfirst($moduleName) . 'UnitTest.php',
                'Create' . ucfirst($moduleName) . 'UnitTest.php',
                'Update' . ucfirst($moduleName) . 'UnitTest.php',
                'Delete' . ucfirst($moduleName) . 'UnitTest.php'
            ],
            'Infrastructure' => [
                'Request' => [
                    ucfirst($moduleName) . 'RequestMother.php'
                ],
                'Show' . ucfirst($moduleName) . 'AcceptTest.php',
                'ShowAll' . ucfirst($moduleName) . 'AcceptTest.php',
                'Create' . ucfirst($moduleName) . 'AcceptTest.php',
                'Update' . ucfirst($moduleName) . 'AcceptTest.php',
                'Delete' . ucfirst($moduleName) . 'AcceptTest.php'
            ],
            'Domain'         => [
                ucfirst($moduleName) => [
                    'ValueObjects',
                    ucfirst($moduleName) . 'Mother.php'
                ]
            ]

        ];
    }

    private function insertTestInPhpUnitApplication()
    {
        $app = file_get_contents('phpunit.xml');
        $app = str_replace(
            '<!-- insert_new_test_instance -->',
            "<testsuite name=\"" . $this->ddd->getModuleName() . "\">" . PHP_EOL .
            "\t\t\t<directory>./tests/" . $this->ddd->getModuleName() . "</directory>" . PHP_EOL .
            "\t\t</testsuite>" . PHP_EOL .
            "\t\t<!-- insert_new_test_instance -->",
            $app
        );
        file_put_contents('phpunit.xml', $app);
    }
}
